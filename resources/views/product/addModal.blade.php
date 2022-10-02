<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form method="POST" action="" id="addForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Product Add page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="errorMsg"></div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="product-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter product name">
                    </div>
                    <div class="mb-3">
                        <label for="product-price" class="col-form-label">Price:</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter your price">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="addProduct" class="btn btn-primary addProduct">Add Product</button>
                </div>
            </div>
        </div>
    </form>
</div>