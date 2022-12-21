<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Orders Create</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('backend/orders/edit/'.$item->id); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user_id">User ID </label>
                            <br>
                            <select class="custom-select form-control" id="user_id" name="user_id">
                                <?php foreach($users as $row){ ?>
                                    <option value="<?php echo $row->id;?>"> <?php echo $row->id; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="payment_methods">
                            <label for="Status">Payment Method</label>
                            <br>
                            <select class="custom-select form-control" id="payments_method" name="payments_method">
                                <?php foreach($payment_methods as $row){ ?>
                                    <option value="<?= $row->id; ?>" <?= ($item->payments_method == $row->id) ? 'selected' : '' ?>> <?= $row->title; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="delivery_methods">Delivery Method</label>
                            <br>
                            <select class="custom-select form-control" id="delivery_method" name="delivery_method">
                                <?php foreach($delivery_methods as $row){ ?>
                                    <option value="<?= $row->id; ?>" <?= ($item->delivery_method == $row->id) ? 'selected' : '' ?>> <?= $row->title; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input type="number" name="total_amount" class="form-control" value="<?= $item->total_amount; ?>"placeholder="Enter Total Amount">
                            <?php echo form_error('total_amount'); ?>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Payment Json</label>
                            <input type="text" name="payment_json" class="form-control" value="<?= $item->payment_json; ?>" placeholder="Enter Payment Json">
                            <?php echo form_error('payment_json'); ?>
                        </div>
                        <div class="form-group">
                            <label for="Status">Status ID</label>
                            <br>
                            <select class="custom-select form-control" id="status_id" name="status_id">
                                <?php foreach($order_status as $row){ ?>
                                    <option value="<?= $row->id; ?>" <?= ($item->status_id == $row->id) ? 'selected' : '' ?>> <?= $row->title; ?></option>
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