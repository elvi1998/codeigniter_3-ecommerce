<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pages Create</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('backend/pages/edit/'.$item->id); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="<?= $item->title; ?>" placeholder="Enter Title">
                            <?php echo form_error('title'); ?>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" value="<?= $item->description; ?>" placeholder="Enter Description">
                            <?php echo form_error('description'); ?>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <input type="text" name="content" class="form-control" value="<?= $item->content; ?>" placeholder="Enter Description">
                            <?php echo form_error('content'); ?>
                        </div>
                        <div class="form-group">
                            <label for="is_menu">Is_menu</label>
                            <br>
                            <select class="custom-select form-control" id="is_menu" name="is_menu">
                                <option value="0" <?php echo  ($item->status == 0) ? 'selected' : ''  ?>>0</option>
                                <option value="1" <?php echo ($item->status == 1) ? 'selected' : ''  ?>>1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <br>
                            <select class="custom-select form-control" id="Status" name="status">
                                <option value="0" <?php echo  ($item->status == 0) ? 'selected' : ''  ?>>Non-Active</option>
                                <option value="1" <?php echo ($item->status == 1) ? 'selected' : ''  ?>>Active</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>