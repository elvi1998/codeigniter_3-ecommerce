<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Blog Create</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('backend/blog/create'); ?>" enctype="multipart/form-data" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title">
                            <?php echo form_error('title'); ?>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Enter Description">
                            <?php echo form_error('description'); ?>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" id="image"">
                            <?php echo form_error('image'); ?>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <input type="text" name="content" class="form-control" placeholder="Enter Content">
                            <?php echo form_error('content'); ?>
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <br>
                            <select class="custom-select form-control" id="Status" name="status">
                                <option value="0">Non-Active</option>
                                <option value="1">Active</option>
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