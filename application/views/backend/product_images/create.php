<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Product Images Create</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('backend/product_images/create'); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Status">Products ID </label>
                            <br>
                            <select class="custom-select form-control" id="products_id" name="products_id">
                                <?php foreach($products as $row){ ?>
                                    <option value="<?php echo $row->id;?>"> <?php echo $row->id; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Status">Images ID</label>
                            <br>
                            <select class="custom-select form-control" id="images_id" name="images_id">
                                <?php foreach($images as $row){ ?>
                                <option value="<?php echo $row->id;?>"> <?php echo $row->id; ?></option>
                                <?php }?>
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