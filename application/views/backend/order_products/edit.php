<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Order Products Create</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('backend/order_products/edit/'.$item->id); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Status">Order ID </label>
                            <br>
                            <select class="custom-select form-control" id="order_id" name="order_id">
                                <?php foreach($orders as $row){ ?>
                                    <option value="<?php echo $row->id;?>"> <?php echo $row->id; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Status">Product</label>
                            <br>
                            <select class="custom-select form-control" id="produc_id" name="product_id">
                                <?php foreach($products as $row){ ?>
                                    <option value="<?php echo $row->id;?>"> <?php echo $row->title; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" value="<?= $item->price; ?>" placeholder="Price">
                            <?php echo form_error('price'); ?>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="<?= $item->quantity; ?>" placeholder="Quantity">
                            <?php echo form_error('quantity'); ?>
                        </div>
                        <div class="form-group">
                            <label for="sales_prices">Amount</label>
                            <input type="number" name="amount" class="form-control" value="<?= $item->amount; ?>" placeholder="amount">
                            <?php echo form_error('amount'); ?>
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