TM.configure({
    baseUrl: 'assets/js',
    
    dependencies: {
        //first: ['jquery']
    },
    
    modules: {
        first: 'page.js',
        jquery: 'lib/jquery-1.11.0.js'
    },
    
    pages: {
        home: {
            controller: 'controller.HomeController',
            module: 'first'
        },
        
        signIn: {
            controller: 'controller.SignInController',
            module: 'first'
        }
    }
});

TM.declare('controller.SignInController').inherit('thinkmvc.Controller').extend(function() {
    return {
        events: {
        }
    };
});

TM.declare('controller.HomeController').inherit('thinkmvc.Controller').extend(function() {
    return {
        events: {
        }
    };
});