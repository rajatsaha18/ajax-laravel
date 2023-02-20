<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {
        // add product
        $(document).on('click', '.add_product', function(e) {
            e.preventDefault();
            let name = $("#name").val();
            let price = $("#price").val();
            $.ajax({
                url: "{{ route('add.product') }}",
                method: "post",
                data: {
                    name: name,
                    price: price
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $("#addModal").modal('hide');
                        $("#addProductForm")[0].reset();
                        $('.table').load(location.href + ' .table');
                        Command: toastr["success"](
                                "Add product successfully",
                                "Success")

                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
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

                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $(".errMsgContainer").append('<span class="text-danger">' +
                            value + '</span>' + '<br>');
                    })
                }
            });
        })
        // show product in update form
        $(document).on('click', '.update_product_form', function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');

            $("#up_id").val(id);
            $("#up_name").val(name);
            $("#up_price").val(price);
        });

        // update product data

        $(document).on('click', '.update_product', function(e) {
            e.preventDefault();
            let up_id = $("#up_id").val();
            let up_name = $("#up_name").val();
            let up_price = $("#up_price").val();
            $.ajax({
                url: "{{ route('update.product') }}",
                method: "post",
                data: {
                    up_id: up_id,
                    up_name: up_name,
                    up_price: up_price
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $("#updateModal").modal('hide');
                        $("#updateProductForm")[0].reset();
                        $('.table').load(location.href + ' .table');
                        Command: toastr["success"](
                                "Update product successfully",
                                "Success")

                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
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

                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $(".errMsgContainer").append('<span class="text-danger">' +
                            value + '</span>' + '<br>');
                    })
                }
            });
        })

        //delete product

        $(document).on('click', '.delete_product', function(e) {
            e.preventDefault();
            let product_id = $(this).data('id');
            if (confirm('Are you sure delete this ?')) {
                $.ajax({
                    url: "{{ route('delete.product') }}",
                    method: "post",
                    data: {
                        product_id: product_id
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.table').load(location.href + ' .table');
                            Command: toastr["success"](
                                "delete product successfully",
                                "Success")

                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
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

        })

    })
</script>
