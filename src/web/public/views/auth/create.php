<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
checklogin();
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/navbar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/views/auth/sidebar.php');
?>
<div class="col-xl-9">
    <div class="main-content-area p-lg-6 p-4 rounded bgc-2 border-full">
        <div class="create-podcast-area p-lg-6 p-sm-4 p-2 rounded-3 border-full bc-500 bgc-4">
            <h4 class="fw-semibold">Create Podcast</h4>
            <span class="d-block my-lg-6 my-4 border-dashed"></span>
            <form action="#" class="d-grid gap-sm-6 gap-4 d-nonge">
                <div class="input-wrapper d-grid gap-lg-4 gap-2">
                    <label for="title" class="fs-five fw-semibold">Title <span class="tcp-1">*</span></label>
                    <input type="text" id="title" placeholder="Enter Podcast Title" wfd-id="id1">
                </div>
                <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-lg-6 gap-4">
                    <div class="d-grid gap-lg-4 gap-2 w-100">
                        <label for="language" class="fs-five fw-semibold">Language <span class="tcp-1">*</span></label>
                        <div class="language-select-area bgc-3 rounded-pill">
                            <select class="language-select-option select2-hidden-accessible" id="language" data-select2-id="select2-data-language" tabindex="-1" aria-hidden="true">
                                <option value="0" selected="" disabled="" data-select2-id="select2-data-2-lsnh">Choose Audio Language</option>
                                <option value="1">English</option>
                                <option value="2">Arabic</option>
                                <option value="3">Hindi</option>
                                <option value="4">Urdu</option>
                                <option value="5">French</option>
                                <option value="6">Spanish</option>
                                <option value="7">German</option>
                                <option value="8">Italian</option>
                                <option value="9">Portuguese</option>
                                <option value="10">Russian</option>
                                <option value="11">Japanese</option>
                                <option value="12">Chinese</option>
                                <option value="13">Korean</option>
                                <option value="14">Vietnamese</option>
                                <option value="15">Thai</option>
                                <option value="16">Indonesian</option>
                                <option value="17">Malay</option>
                                <option value="18">Bengali</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-1-3umi" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-language-container" aria-controls="select2-language-container"><span class="select2-selection__rendered" id="select2-language-container" role="textbox" aria-readonly="true" title="Choose Audio Language">Choose Audio Language</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                    </div>
                    <div class="d-grid gap-lg-4 gap-2 w-100">
                        <label for="category" class="fs-five fw-semibold">Category <span class="tcp-1">*</span></label>
                        <div class="category-select-area bgc-3 rounded-pill">
                            <select class="category-select-option select2-hidden-accessible" id="category" data-select2-id="select2-data-category" tabindex="-1" aria-hidden="true">
                                <option value="0" selected="" disabled="" data-select2-id="select2-data-4-hidk">Choose a Category</option>
                                <option value="1">Horror</option>
                                <option value="2">Life Style</option>
                                <option value="3">Drama</option>
                                <option value="4">Comedy</option>
                                <option value="5">Romance</option>
                                <option value="6">Music</option>
                                <option value="7">Travel</option>
                                <option value="8">Educational</option>
                                <option value="9">Sports</option>
                                <option value="10">Technology</option>
                                <option value="11">Health</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-3-9mk7" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-category-container" aria-controls="select2-category-container"><span class="select2-selection__rendered" id="select2-category-container" role="textbox" aria-readonly="true" title="Choose a Category">Choose a Category</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                    </div>
                </div>
                <div class="input-wrapper d-grid gap-lg-4 gap-2">
                    <label for="email" class="fs-five fw-semibold">Email <span class="tcp-1">*</span></label>
                    <input type="email" id="email" placeholder="Enter Your Email" wfd-id="id2">
                    <span class="tcp-1 fs-sm">
                        By adding your email address here, it will be displayed on your podcast page and
                        RSS feed. This email address allows you to confirm the ownership into platforms
                        like Spotify and Google Podcasts
                    </span>
                </div>
                <div class="podcast-img-upload d-grid gap-lg-10 gap-6">
                    <!-- picture img area  -->
                    <div class="d-grid gap-lg-4 gap-2">
                        <label class="fs-five fw-semibold">Picture</label>
                        <div class="upload-post-img d-flex flex-column flex-md-row align-items-md-center gap-lg-10 gap-md-6 gap-4">
                            <div class="preview-img-area">
                                <img class="w-100 h-100 rounded-3 previewImg" src="assets/img/upload-preview.png" alt="preview">
                            </div>
                            <div class="upload-img-area">
                                <p class="fs-sm mb-lg-3 mb-2">
                                    We recommend uploading an artwork of at least 1400x1400 pixels and
                                    maximum 512kb. We support jpg, png, gif and tiff formats.
                                </p>
                                <p class="fs-sm tcp-1 mb-lg-8 mb-sm-6 mb-4">
                                    A great image speaks louder than words. Don’t forget to add one that
                                    you feel best represents your podcast!
                                </p>
                                <button class="bttn-1 uploadPreview">
                                    <span class="fs-xl fw-bold">
                                        <i class="ti ti-circle-plus"></i>
                                    </span>
                                    <span class="fw-bold">Upload Image</span>
                                </button>
                                <input type="file" class="inputFile" accept="image/*" hidden="" wfd-id="id3">
                                <span class="warning-msg text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <!-- cover image area  -->
                    <div class="d-grid gap-lg-4 gap-2">
                        <label class="fs-five fw-semibold">Cover Image</label>
                        <div class="upload-post-img d-flex flex-column flex-sm-row align-items-sm-center gap-lg-6 gap-4">
                            <div class="preview-img-area-2">
                                <img class="w-100 h-100 rounded-3 previewImg" src="assets/img/upload-preview-2.png" alt="preview">
                            </div>
                            <div class="upload-img-area-2">
                                <p class="fs-sm mb-lg-4 mb-2">
                                    Adding a cover image is a great way to
                                    enhance your podcast page. Become a Pro user to upload More.
                                </p>
                                <!-- enable upload more images btn for pro user -->
                                <!-- <button class="bttn-1 bttn-outline uploadPreview">
                                                    Upload
                                                </button>
                                                <input type="file" class="inputFile" accept="image/*" hidden> -->
                                <a href="#" class="bttn-1 bttn-outline">
                                    Upgrade
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visibility d-grid gap-lg-4 gap-2">
                    <label class="fs-five fw-semibold">Visibility</label>
                    <div class="d-grid gap-lg-3 gap-1">
                        <div>
                            <div class="d-grid gap-lg-4 gap-2">
                                <label class="custom-radio">
                                    <input type="radio" id="public" name="visibility" value="public" hidden="" wfd-id="id4">
                                    <span class="form-radio-sign"></span>
                                    <span class="cursor-pointer">Public <span class="fw-normal tcn-40">(can be listened to by
                                            anyone)</span></span>
                                </label>
                                <label class="custom-radio">
                                    <input type="radio" id="private" name="visibility" value="private" hidden="" wfd-id="id5">
                                    <span class="form-radio-sign"></span>
                                    <span class="cursor-pointer">Private <span class="fw-normal tcn-40">(can't be listened to by
                                            anyone)</span></span>
                                </label>
                                <label class="custom-radio">
                                    <input type="radio" id="limited" name="visibility" value="limited" hidden="" wfd-id="id6">
                                    <span class="form-radio-sign"></span>
                                    <span class="cursor-pointer">Limited Access <span class="fw-normal tcn-40">(allows creating
                                            Paid Subscriptions)</span></span>
                                </label>
                            </div>
                            <span class="d-block tcp-1 fs-sm mt-lg-6 mt-sm-4 mt-2">
                                Do you want to share this content with just a few select listeners via a
                                limited access link? Then upgrade to Broadcaster plan or higher!
                            </span>
                            <a href="#" class="bttn-1 bttn-outline mt-lg-10 mt-ms-6 mt-4">
                                Upgrade
                            </a>
                        </div>
                    </div>
                </div>
                <!-- post details input area  -->
                <div class="post-details-input-area d-grid gap-lg-4 gap-2">
                    <span class="fs-five fw-semibold">Description</span>
                    <textarea id="summernote" name="editordata"></textarea>
                  
                    <p class="tcp-1 fs-sm">
                        Listeners want to know what your podcast is about before they tune in. Hook them
                        in with a persuasive description that quickly sums up what the main concept and
                        structure of your podcast is.
                    </p>
                </div>
                <div class="mt-4">
                    <button class="bttn-1">
                        <span>Create Podcast</span>
                        <span class="icon  d-center icon-right"><i class="ti ti-arrow-right"></i></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</main>


<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/footer.php');
?>