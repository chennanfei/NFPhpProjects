<form id="userAuthForm" class="lh-form" action="{$signInUrl}" method="post">
    <div class="lh-row lh-input">
        <div class="lh-col3 lh-input-label">User ID:</div>
        <div class="lh-col9 lh-col-last">
            <input class="lh-input-text" type="text" name="userID" value="{$userID}" autofocus>
        </div>
    </div>
    <div class="lh-row lh-input">
        <div class="lh-col3 lh-input-label">Password:</div>
        <div class="lh-col9 lh-col-last">
            <input class="lh-input-text" type="password" name="password">
        </div>
    </div>
    <div class="lh-row lh-input">
        <div class="lh-col3-offset lh-col9 lh-col-last lh-text-right">
            <input class="lh-button lh-button-primary" type="submit" name="signInBtn" value="Sign in">
        </div>
    </div>
</form>