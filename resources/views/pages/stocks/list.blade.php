<div class="modal fade" id="list">
    <div class="modal-dialog modal-lg">
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
                        <p><strong class="text-warning">Trims Name: </strong><span id="name"></span></p><br>
                        <p><strong class="text-warning">Type: </strong><span id="type"></span></p><br>
                        <p><strong class="text-warning">Supplier: </strong><span id="supplier"></span></p><br>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>id</th>
                            <th>Trims Name</th>
                            <th>Who Took Out</th>
                            <th>Dispatch</th>
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