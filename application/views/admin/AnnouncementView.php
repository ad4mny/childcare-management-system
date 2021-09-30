<div class="container my-5">
    <div class="row border-bottom pb-1">
        <div class="col">
            <h1 class="">Manage Announcement</h1>
        </div>
        <div class="col text-end m-auto">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnnouncement">Add New</button>
        </div>
    </div>
    <?php if (isset($announcements) && $announcements != false) {
        foreach ($announcements as $announcement) { ?>
            <div class="row py-2">
                <div class="col">
                    <div class="card h-100 rounded-3 border-0 shadow position-relative">
                        <div class="card-header">
                            <h5 class="text-capitalize"><?php echo $announcement['title']; ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <p class="mb-0"><?php echo $announcement['description']; ?></p>
                            </div>
                            <p class="card-text text-end"><small class="text-muted">Last updated <?php echo $announcement['datetime']; ?></small></p>
                        </div>
                        <div class="position-absolute top-0 end-0 me-2 mt-2">
                            <a href="<?php echo base_url() . 'manage/announcement/remove/' . $announcement['announcementid']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this announcement?');">
                                <i class="fas fa-times fa-fw "></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    } else { ?>
        <div class="row py-2">
            <div class="col">
                <div class="card h-100 rounded-3 border-0 shadow">
                    <div class="card-body">
                        <div class="card-text">
                            <p class="mb-0">No new announcements.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<div class="modal fade" id="addAnnouncement" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>New Announcement</h3>
            </div>
            <div class="modal-body">
                <form class="row g-2" method="post" action="<?php echo base_url(); ?>teacher/announcement/submit">
                    <div class="col-12 pb-2">
                        <small>Announcement's Title</small>
                        <input type="text" class="form-control" name="title" placeholder="Enter announcement title" required>
                    </div>
                    <div class="col-12 pb-2">
                        <small>Announcement's Description (Max 5000 Characters)</small>
                        <textarea class="form-control" name="description" placeholder="Max 5000 Characters" rows="10" max="5000" required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" type="button" name="submit" onclick="return confirm('Are you sure to add this announcement?');">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>