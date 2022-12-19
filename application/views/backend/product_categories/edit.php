<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Product Categories Create</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('backend/product_categories/edit/'.$item->id); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Status">Product ID </label>
                            <br>
                            <select class="custom-select form-control" id="products_id" name="products_id">
                                <option value="<?php echo $item->products_id;?>"> <?php echo $item->products_id; ?></option>
                                <?php foreach($products as $row){ ?>
                                    <option value="<?php echo $row->id;?>"> <?php echo $row->id; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Status">Categories ID</label>
                            <br>
                            <select class="custom-select form-control" id="categories_id" name="categories_id">
                                <?php foreach($categories as $row){ ?>
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