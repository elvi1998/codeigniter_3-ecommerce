<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Products Create</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('backend/products/edit/'.$item->id); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="<?= $item->title; ?>" placeholder="Enter Title">
                            <?php echo form_error('title'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <input type="text" name="description" class="form-control" value="<?= $item->description; ?>" placeholder="Enter Title">
                            <?php echo form_error('description'); ?>
                        </div>
                        <div class="form-group">
                            <label for="brand_id">Brand_id</label>
                            <br>
                            <select class="custom-select form-control" id="brand_id" name="brand_id">
                                <?php foreach($brands as $row) { ?>
                                <option value="<?= $row->id?>" <?= ($item->brand_id == $row->id) ? 'selected' : '' ?>> <?= $row->title; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="<?= $item->quantity; ?>" placeholder="Enter Quantity">
                            <?php echo form_error('quantity'); ?>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" value="<?= $item->price; ?>" placeholder="Enter Price">
                            <?php echo form_error('price'); ?>
                        </div>
                        <div class="form-group">
                            <label for="sales_prices">Sales Prices</label>
                            <input type="number" name="sales_prices" class="form-control" value="<?= $item->sales_prices; ?>" placeholder="Enter Sales_prices">
                            <?php echo form_error('sales_prices'); ?>
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