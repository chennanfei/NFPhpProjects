<div class="lh-row lh-upload-container">
    <div class="lh-upload-spinner" id="uploadSpinner">
        Uploading, please wait...
    </div>
    <div class="lh-spacing-base">Current image: {$image->getImageName()}</div>
    <div class="lh-upload-image lh-spacing-base" id="previewedImage">
        {if $image->getId()}
        <img src="{$image->getImageUrl()}">
        {/if}
    </div>
    <form id="imageUploadForm" enctype="multipart/form-data" action="{$uploadImageUrl}" method="post">
        <input type="hidden" name="imageNamePrefix" value="{$image->getImageNamePrefix()}">
        {include file="widgets/text-input-row.tpl" right_col="4" input_type="file"
            input_name="uploadedImage"}
    </form>
    {include file="widgets/alert.tpl" message="Click Save button after image is uploaded" messageType="info"}
</div>