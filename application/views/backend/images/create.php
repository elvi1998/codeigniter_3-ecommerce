<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Images Create</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('backend/images/create'); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Status">Product_id </label>
                            <br>
                            <select class="custom-select form-control" id="product_id" name="product_id">
                                <?php foreach($products as $row){ ?>
                                    <option value="<?php echo $row->id;?>"> <?php echo $row->title; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="path">Path</label>
                            <input type="text" name="path" class="form-control" placeholder="Enter Path">
                            <?php echo form_error('path'); ?>
                        </div>
                        <div class="form-group">
                            <label for="main">Main</label>
                            <br>
                            <select class="custom-select form-control" id="main" name="main">
                                <option value="0">0</option>
                                <option value="1">1</option>
                            </select>
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