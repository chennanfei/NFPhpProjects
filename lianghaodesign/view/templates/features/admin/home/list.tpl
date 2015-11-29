<div class="lh-spacing-big lh-spacing-top-big">
    <div class="lh-row lh-spacing-big">
        {include file="widgets/box-link.tpl" box_url=$imagesUrl box_title="GATEWAY IMAGES"
            box_content="Update the images displayed on the gateway page which customers firstly access."}
    
        {include file="widgets/box-link.tpl" box_url=$projectsUrl box_title="PROJECTS"
            box_content="Create new projects and display them on front site."}
    
        {include file="widgets/box-link.tpl" box_url=$profileUrl box_title="COMPANY PROFILE" is_last=1
            box_content="You can update the information of the company, e.g address, phone number, email etc. "}
    </div>
    <div class="lh-row">
        {include file="widgets/box-link.tpl" box_url=$accountUrl box_title="CHANGE PASSWORD" is_last=1
            box_content="Change the password of administator accounts which allows people to modify the information displayed on Lianghao site.
                If you forget the password, you need contact chennanfei2006(at)163.com."}
    </div>
</div>