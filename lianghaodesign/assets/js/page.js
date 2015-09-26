TM.configure({
    baseUrl: 'assets/js',
    
    dependencies: {
        //first: ['jquery'],
        //jqueryForm: ['jquery']
    },
    
    modules: {
        first: 'page.js',
        jquery: 'lib/jquery-1.11.0.js',
        jqueryForm: 'lib/jquery.form.min.js'
    },
    
    pages: {
        account: {
            controller: 'controller.AccountController',
            module: 'first'
        },
        
        gwImageList: {
            controller: 'controller.GatewayImageListController',
            module: 'first'
        },
        
        gwImage: {
            controller: 'controller.GatewayImageController',
            module: 'first'
        },
        
        home: {
            controller: 'controller.HomeController',
            module: 'first'
        },
        
        project: {
            controller: 'controller.ProjectController',
            module: 'first'
        },
        
        projectList: {
            controller: 'controller.ProjectListController',
            module: 'first'
        },
        
        projectImageList: {
            controller: 'controller.ProjectImageListController',
            module: 'jqueryForm'
        },
        
        signIn: {
            controller: 'controller.SignInController',
            module: 'first'
        },
        
        team: {
            controller: 'controller.TeamController',
            module: 'first'
        },
        
        teamMember: {
            controller: 'controller.TeamMemberController',
            module: 'first'
        }
    }
});

// sign in
TM.declare('controller.SignInController').inherit('thinkmvc.Controller').extend({
    events: {
        'click input[name="signInBtn"]': 'checkoutInputs'
    },

    selectors: {
        pwd: 'input[name="password"]',
        uid: 'input[name="userID"]'
    },

    checkoutInputs: function(event) {
        event.preventDefault();
        event.stopPropagation();

        this.U.createInstance('model.UserAuth', this._el.$uid.val(), this._el.$pwd.val()).handle();
    }
});

TM.declare('model.UserAuth').inherit('thinkmvc.Model').extend({
    viewPath: 'view.UserAuthView',
    
    initialize: function(userID, password) {
        this.invoke('thinkmvc.Model:initialize');

        this._uid = userID;
        this._pwd = password;
    },
    
    handle: function() {
        var validator = this.U.createInstance('thinkmvc.val.Validator', this);
        if (validator.hasErrors()) {
            this.trigger('show-error', validator.getMessage());
        } else {
            this.trigger('sign-in');
        }
    },

    validate: function(validator) {
        if (!(this._uid && this._uid.length >= 6)) {
            validator.createError('uid', 'User ID should have 6 or more charactors.');
        }

        if (!this.verifyPassword(this._pwd)) {
            validator.createError('pwd', 'Password should have 6~15 charactors.');
        }
    },
    
    verifyPassword: function(pwd) {
        return pwd && pwd.length >= 6 && pwd.length <= 15;
    }
});

TM.declare('view.UserAuthView').inherit('thinkmvc.View').extend({
    events: {
        'show-error': 'showError',
        'sign-in': 'submitSignInForm'
    },
    
    selectors: {
        alert: '#msgAlert',
        form: '#userAuthForm'
    },
    
    showError: function(event) {
        this._el.$alert.removeClass('lh-hidden').addClass('lh-alert-error').html(event.data);
    },
    
    submitSignInForm: function(event) {
        this._el.$alert.addClass('lh-hidden');
        this._el.$form.submit();
    }
});

// change password
TM.declare('model.ChangePwdAuth').inherit('model.UserAuth').extend({
    initialize: function(userID, oldPwd, newPwd, confirmedPwd) {
        this.invoke('model.UserAuth:initialize', userID, oldPwd);

        this._newPwd = newPwd;
        this._confirmedPwd = confirmedPwd;
    },
    
    validate: function(validator) {
        this.invoke('model.UserAuth:validate', validator);
        
        if (!this.verifyPassword(this._newPwd)) {
            validator.createError('newPwd', 'New password should have 6~15 charactors.');
        } else if (this._confirmedPwd !== this._newPwd) {
            validator.createError('confirmedPwd', 'New passwords you enter twice do not match.');
        }
    }
});

TM.declare('controller.AccountController').inherit('thinkmvc.Controller').extend({
    events: {
        'click #confirmBtn': 'checkoutInputs'
    },

    selectors: {
        confirmedPwd: 'input[name="confirmedPwd"]',
        newPwd: 'input[name="newPwd"]',
        oldPwd: 'input[name="oldPwd"]',
        uid: 'input[name="userID"]'
    },

    checkoutInputs: function(event) {
        event.preventDefault();
        event.stopPropagation();

        this.U.createInstance('model.ChangePwdAuth',
            this._el.$uid.val(), this._el.$oldPwd.val(),
            this._el.$newPwd.val(), this._el.$confirmedPwd.val()
        ).handle();
    }
});

// home
TM.declare('controller.HomeController').inherit('thinkmvc.Controller').extend({});

// project
TM.declare('controller.ProjectController').inherit('thinkmvc.Controller').extend({
    events: {
        'change select[name=channelId]': 'displayPrograms',
    },
    
    rootNode: '#projectForm',
    
    selectors: {
        programSel: 'select[name=programId]',
        channelSel: 'select[name=channelId]',
    },
    
    initialize: function() {
        this.invoke('thinkmvc.Controller:initialize');
        
        var channelId = this._$root.data('channelId');
        if (channelId) {
            this._el.$channelSel.val(channelId).change();
        }
    },
    
    displayPrograms: function(event) {
        var i, groupId = 'programs.' + $(event.currentTarget).val(),
            $sel = this._el.$programSel, $groups = $sel.find('optgroup'), isFound = false;

        for (i = 0; i< $groups.length; i++) {
            var $grp = $groups.eq(i);
            if ($grp.attr('id') == groupId) {
                $grp.removeClass('lh-hidden');
                isFound = true;
            } else {
                $grp.addClass('lh-hidden');
            }
        }
        
        if (!isFound) {
            $sel.val($sel.find('option:first').val());
        }
    },
});

TM.declare('controller.ProjectListController').inherit('thinkmvc.Controller').extend({
    events: {
        'click a.lh-delete-project': 'deleteProject',
    },
    
    rootNode: '#projectList',
    
    deleteProject: function(event) {
        if (!confirm('Do you really want to delete this project?')) {
            return;
        }
        
        var $target = $(event.currentTarget), data = $target.data();
        data['a'] = 'delete';
        $.ajax(data['url'], {
            method: 'post',
            dataType: 'json',
            data: data,

            error: function(data) {
                alert(data.message);
            },
            
            success: function(data) {
                $target.parents('div.lh-list-item').remove();
            }
        });
    }
});

TM.declare('controller.ProjectImageListController').inherit('thinkmvc.Controller').extend({
    events: {
        'click a.lh-delete-image': 'deleteImage',
    },
    
    rootNode: '#projectImageList',
    
    initialize: function() {
        this.invoke('thinkmvc.Controller:initialize');
        this.U.createInstance('controller.ImageUploadController');
    },
    
    deleteImage: function(event) {
        if (!confirm('Do you really want to delete this image?')) {
            return;
        }
        var $target = $(event.currentTarget), data = $target.data();
        data['a'] = 'delete';
        $.ajax(data['url'], {
            method: 'post',
            dataType: 'json',
            data: data,

            error: function(data) {
                alert(data.message);
            },
            
            success: function(data) {
                $target.parents('div.lh-list-item').remove();
            }
        });
    }
});

TM.declare('controller.ImageUploadController').inherit('thinkmvc.Controller').extend({
    events: {
        'change input[name=uploadedImage]': 'uploadImage'
    },
    
    selectors: {
        imageType: 'input[name=imageType]',
        imageName: 'input[name=imageName]',
        previewedImage: '#previewedImage',
        uploadForm: '#imageUploadForm',
        spinner: '#uploadSpinner',
    },
    
    uploadImage: function(event) {
        var el = this._el;
        el.$uploadForm.ajaxForm({
            target: '#previewedImage',
            
            beforeSubmit: function() {
                el.$spinner.show();
            },
            
            complete: function() {
                el.$spinner.hide();
            },
            
            success: function(text) {
                console.log(text);
                var data = el.$previewedImage.find('img').data();
                if (data) {
                    el.$imageName.val(data.imageName);
                }
            }
        }).submit();
    }
});

TM.declare('controller.GatewayImageListController').inherit('thinkmvc.Controller').extend({
    events: {
        'click a.lh-delete-image': 'deleteImage',
    },

    rootNode: '#gwImages',
    
    deleteImage: function(event) {
        if (!confirm('Do you really want to delete this image?')) {
            return;
        }
        var $target = $(event.currentTarget), data = $target.data();
        data['a'] = 'delete';
        $.ajax(data['url'], {
            method: 'post',
            dataType: 'json',
            data: data,

            error: function(data) {
                alert(data.message);
            },
            
            success: function(data) {
                $target.parents('div.lh-list-item').remove();
            }
        });
    }
});

TM.declare('controller.GatewayImageController').inherit('thinkmvc.Controller').extend({
    initialize: function() {
        this.invoke('thinkmvc.Controller:initialize');
        this.U.createInstance('controller.ImageUploadController');
    },
});

TM.declare('controller.TeamController').inherit('thinkmvc.Controller').extend({
});

TM.declare('controller.TeamMemberController').inherit('thinkmvc.Controller').extend({
    initialize: function() {
        this.invoke('thinkmvc.Controller:initialize');
        this.U.createInstance('controller.ImageUploadController');
    },
});
