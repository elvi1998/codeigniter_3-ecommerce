<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Images Create</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('backend/images/edit/'.$item->id); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="product_id">Product_id</label>
                            <br>
                            <select class="custom-select form-control" id="product_id" name="product_id">
                                <?php foreach($products as $row){ ?>
                                    <option value="<?= $row->id?>" <?= ($item->product_id == $row->id) ? 'selected' : '' ?>> <?= $row->title; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="path">Path</label>
                            <input type="text" name="path" class="form-control" value="<?= $item->path; ?>" placeholder="Enter path">
                            <?php echo form_error('path'); ?>
                        </div>
                        <div class="form-group">
                            <label for="main">Main</label>
                            <br>
                            <select class="custom-select form-control" id="main" name="main">
                                <option value="0" <?php echo  ($item->main == 0) ? 'selected' : ''  ?>>0</option>
                                <option value="1" <?php echo ($item->main == 1) ? 'selected' : ''  ?>>1</option>
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