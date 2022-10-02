<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">SL NO</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
      <tr>
        <th scope="row">{{ $products->firstItem()+$loop->index }}</th>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>
            <button type="button" class="btn btn-success updateButton"
            data-bs-toggle="modal" data-bs-target="#updateModal"
            data-id = "{{ $product->id }}",
            data-name = "{{ $product->name }}",
            data-price = "{{ $product->price }}">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
            <button type="button" id="deleteButton" class="btn btn-danger deleteButton"
            data-id={{ $product->id }} ><i class="fa-solid fa-xmark"></i></button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $products->links() }}