<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Products Create</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('backend/products/create'); ?>" method="post">
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
                            <label for="Status">Brand_id </label>
                            <br>
                            <select class="custom-select form-control" id="brand_id" name="brand_id">
                                <?php foreach($brands as $row){ ?>
                                <option value="<?php echo $row->id;?>"> <?php echo $row->title; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity">
                            <?php echo form_error('quantity'); ?>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" placeholder="Enter Price">
                            <?php echo form_error('price'); ?>
                        </div>
                        <div class="form-group">
                            <label for="sales_prices">Sales_prices</label>
                            <input type="number" name="sales_prices" class="form-control" placeholder="Enter Sales_prices">
                            <?php echo form_error('sales_prices'); ?>
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