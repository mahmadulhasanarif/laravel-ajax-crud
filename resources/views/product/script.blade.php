<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<script>
    $(document).ready(function(){
        $(document).on('click', '#addProduct', function(e){
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();

            $.ajax({
                url: "{{ route('product.store') }}",
                method:'POST',
                data:{name:name, price:price},
                success:function(res){
                    $('#addModal').modal('hide');
                    $('#addForm')[0].reset();
                    $('.table').load(location.href+' .table');
                    Command: toastr["success"]("Product data added successfully!", "add success")

                            toastr.options = {
                            "closeButton": false,
                            "debug": true,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                },error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value){
                        $('.errorMsg').append('<span class="text-danger">'+value+'</span>'+'<br>')
                    });
                }
            });
        });
        // edit Product
        $(document).on('click', '.updateButton', function(){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);
        });

        $(document).on('click', '#UpdateProduct', function(e){
            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_price = $('#up_price').val();
            console.log(up_id + up_name + up_price)
            $.ajax({
                url: "{{ route('product.update') }}",
                method: 'POST',
                data: {up_id:up_id, up_name:up_name, up_price:up_price},
                success:function(res){
                    if(res.status == 'success'){
                        $('#updateModal').modal('hide');
                        $('#updateForm')[0].reset();
                        $('.table').load(location.href+' .table');
                        Command: toastr["success"]("Product data updated successfully!", "update success")

                            toastr.options = {
                            "closeButton": false,
                            "debug": true,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                    }
                },error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value){
                        $('.errorMsg').append('<span class="text-danger">'+value+'</span>'+'<br>')
                    });
                }
            });
        });

        $(document).on('click', '#deleteButton', function(e){
            e.preventDefault();
            let product_id = $(this).data('id');

            if(confirm('Are you sure you want to delete this')){
                $.ajax({
                    url: "{{ route('product.delete') }}",
                    method:"GET",
                    data:{product_id:product_id},
                    success:function(res){
                        if(res.status == 'success'){
                            $('.table').load(location.href+' .table');
                            Command: toastr["warning"]("Product data deleted successfully!", "delete success")

                            toastr.options = {
                            "closeButton": false,
                            "debug": true,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                        }
                    }
                });
            }
        });

        $(document).on('click', '.pagination a', function(e){
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];

            paginator(page);
        });

        function paginator(page){
            $.ajax({
                url: '/paginator?page='+page,
                success:function(res){
                    $('.card-body').html(res);
                }
            });
        }

        $(document).on('keyup', function(e){
            e.preventDefault();
            let search = $('#search').val();
            $.ajax({
                url: "{{ route('search') }}",
                method: "GET",
                data:{search:search},
                success:function(res){
                    $('.card-body').html(res);
                },error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value){
                        $('.card-body').html('<span class="text-danger">'+"Result Not Found"+'</span>');
                    });
                }
            });
        });

    });
</script>