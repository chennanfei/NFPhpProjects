<form id="userAuthForm" class="lh-box lh-form" action="{$accountUrl}" method="post">
    <div class="lh-row lh-input">
        <div class="lh-col4 lh-input-label">User ID:</div>
        <div class="lh-col8 lh-col-last">
            <input class="lh-input-text" type="text" name="userID" value="{$userID}" autofocus>
        </div>
    </div>
    <div class="lh-row lh-input">
        <div class="lh-col4 lh-input-label">Old password:</div>
        <div class="lh-col8 lh-col-last">
            <input class="lh-input-text" type="password" name="oldPwd">
        </div>
    </div>
    <div class="lh-row lh-input">
        <div class="lh-col4 lh-input-label">New password:</div>
        <div class="lh-col8 lh-col-last">
            <input class="lh-input-text" type="password" name="newPwd">
        </div>
    </div>
    <div class="lh-row lh-input">
        <div class="lh-col4 lh-input-label">Confirm password:</div>
        <div class="lh-col8 lh-col-last">
            <input class="lh-input-text" type="password" name="confirmedPwd">
        </div>
    </div>
    <div class="lh-row lh-input">
        <div class="lh-col4-offset lh-col8 lh-col-last lh-text-right">
            <input type="hidden" name="action" value="updatePwd">
            <input id="confirmBtn" class="lh-button lh-button-primary" type="submit" value="Confirm">
        </div>
    </div>
</form>