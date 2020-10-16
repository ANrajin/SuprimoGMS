<div class="modal fade" id="list">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">List Items</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong class="text-warning">Order ID: </strong><span id="o_id"></span></p><br>
                        <p><strong class="text-warning">Buyer: </strong><span id="name"></span></p><br>
                        <p><strong class="text-warning">Shipment Date: </strong><span id="shipment"></span></p><br>
                    </div>
                </div>

                <table class="table table-responsive">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>id</th>
                            <th>Sample Name</th>
                            <th>Production Quantity</th>
                            <th>Sewing Quantity</th>
                            <th>Wash Quantity</th>
                            <th>Finished Quantity</th>
                            <th>Wastage Quantity</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="list_table" class="text-center">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>