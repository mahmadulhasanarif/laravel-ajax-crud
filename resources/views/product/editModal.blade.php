<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <form method="POST" action="" id="updateForm">
      @csrf
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="addModalLabel">Product Update page</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="errorMsg"></div>

              <div class="modal-body">
                <input type="hidden" id="up_id">
                  <div class="mb-3">
                      <label for="product-name" class="col-form-label">Name:</label>
                      <input type="text" class="form-control" id="up_name" placeholder="Enter product name">
                  </div>
                  <div class="mb-3">
                      <label for="product-price" class="col-form-label">Price:</label>
                      <input type="text" class="form-control" id="up_price" placeholder="Enter your price">
                  </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" id="UpdateProduct" class="btn btn-primary UpdateProduct">Update Product</button>
              </div>
          </div>
      </div>
  </form>
</div>