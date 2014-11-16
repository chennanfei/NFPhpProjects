<div class="lh-row lh-spacing-big lh-spacing-top-big">
    {include file="widgets/box-link.tpl" box_url=$newProjUrl box_title="NEW PROJECT"
        box_content="You can create a new project and display it on your site."}
    
    {include file="widgets/box-link.tpl" box_url=$projectsUrl box_title="VIEW PROJECTS"
        box_content="See all projects displayed on the site and then you can edit them."}
    
    {include file="widgets/box-link.tpl" box_url=$updateGWUrl box_title="UPDATE GATEWAY IMAGES" is_last=1
        box_content="Update the images displayed on the gateway page which customers firstly access."}
</div>

<div class="lh-row">
    {include file="widgets/box-link.tpl" box_url=$updateTeamUrl box_title="UPDATE TEAM"
        box_content="You can update photos of and names of team members."}
    
    {include file="widgets/box-link.tpl" box_url=$accountUrl box_title="CHANGE PASSWORD" is_last=1
        box_content="Change the password of administator account which allows people to modify the information displayed on Lianghao site.
            If you forget the password, you need contact chennanfei2006(at)163.com."}
</div>