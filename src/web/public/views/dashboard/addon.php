<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
checklogin();
$id = $auth['ArtistID'];
$row  = $duogxaolin->get_row("SELECT * FROM `artists` WHERE `ArtistID` = '$id'");
if (!$row) {
    header('Location: /create/singer');
    die();
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/navbar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/views/auth/sidebar.php');
?>
<div class="col-xl-9">
<div class="create-podcast-area p-lg-6 p-sm-4 p-2 rounded-3 border-full bc-500 bgc-4">
                    <h4 class="fw-semibold">Thêm Bài Hát</h4>
                    <span class="d-block my-lg-6 my-4 border-dashed"></span>
                    <form submit-ajax="duogxaolin" action="/api/singer/music" class="d-grid gap-sm-6 gap-4 d-nonge" method="POST">
                                    <input type="hidden" name="action" value="add">
                        <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-lg-6 gap-4">
                            <div class="input-wrapper d-grid gap-lg-4 gap-2 w-100">
                                <label for="title" class="fs-five fw-semibold">Tên Bài <span class="tcp-1">*</span></label>
                                <input type="text" name="title" value="" placeholder="Tên Bài" wfd-id="id1">
                            </div>

                        </div>

                        <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-lg-6 gap-4">
                            <div class="input-wrapper d-grid gap-lg-4 gap-2 w-100">
                                <label for="title" class="fs-five fw-semibold">Ngày Phát Hành <span class="tcp-1">*</span></label>
                                <input type="text" name="Duration" value="" placeholder="Ngày Phát Hành" wfd-id="id1">
                            </div>

                        </div>

                        <div class="podcast-img-upload d-grid gap-lg-10 gap-6">
                            <!-- picture img area  -->
                            <div class="d-grid gap-lg-4 gap-2">
                                <label class="fs-five fw-semibold">Ảnh</label>
                                <div class="upload-post-img d-flex flex-column flex-md-row align-items-md-center gap-lg-10 gap-md-6 gap-4">
                                    <div class="preview-img-area">
                                        <img class="w-100 h-100 rounded-3 previewImg" src="/assets/img/upload-preview.png" alt="preview">
                                    </div>
                                    <div class="upload-img-area">
                                        <p class="fs-sm mb-lg-3 mb-2">
                                            Đây sẽ là ảnh hiển thị với người nghe
                                        </p>
                                        <p class="fs-sm tcp-1 mb-lg-8 mb-sm-6 mb-4">
                                            Vui lòng chọn ảnh chất lượng nhất có thể
                                        </p>
                                        <button class="bttn-1 uploadPreview">
                                            <span class="fs-xl fw-bold">
                                                <i class="ti ti-circle-plus"></i>
                                            </span>
                                            <span class="fw-bold">Upload Image</span>
                                        </button>
                                        <input type="file" class="inputFile" accept="image/*" hidden="" name="attachments" wfd-id="id3">
                                        <span class="warning-msg text-danger"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="input-wrapper d-grid gap-lg-4 gap-2">
                            <div class="audio-upload-area input-file active">
                                <div class="d-grid gap-lg-4 gap-2">
                                    <label for="audio-file" class="fs-five fw-medium">File type audio and .mp3
                                        <span class="tcp-1">*</span></label>
                                    <input type="file" class="p-lg-2 p-1" id="audio-file" name="mp3File" accept="audio/*" wfd-id="id2">
                                </div>
                            </div>
                            <span class="tcp-1 fs-sm">
                              Chỉ chấp nhận file mp3 và mov
                            </span>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bttn-1">
                                <span>Thêm Ngay</span>
                                <span class="icon  d-center icon-right"><i class="ti ti-arrow-right"></i></span>
                            </button>
                        </div>
                    </form>
                </div>
</div>
</div>
</div>
</main>


<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/public/includes/footer.php');
?>