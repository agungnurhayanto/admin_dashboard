<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>

<script>
    //button create category
    $('body').on('click', '#btn-create-category', function() {

        //open modal
        $('#modal-create').modal('show');
    });

    $('#store-category').click(function(e) {
        e.preventDefault();

        // define variable
        let category = $('#kategori_nama').val();
        let token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: `/kategori/store`,
            type: "POST",
            cache: false,
            data: {
                "kategori_nama": category,
                "_token": token
            },

            success: function(response) {
                //show success message
                Swal.fire({
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                location.reload();
                // data category
                let category = `
                    <tr id="index_${response.data.id}">

                        <td>${response.data.kategori_nama} </td>
                        <td>${response.data.kategori_slug} </td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-kategori" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-kategori" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;

                //append to table di halaman view nya di dalam tbody
                $('#table-kategori').prepend(category);
                //clear form
                $('#kategori_nama').val('');
                //close modal
                $('#modal-create').modal('hide');

            },
            error: function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status === 422) {
                    let errors = jqXHR.responseJSON.errors;
                    if (errors.kategori_nama) {
                        // show alert
                        $('#alert-kategori_nama').removeClass('d-none');
                        $('#alert-kategori_nama').addClass('d-block');

                        //add message to alert
                        $('#alert-kategori_nama').html(errors.kategori_nama[0]);
                    }
                }
            }

        });
    });
    //action category

    // category delete
    $('body').on('click', '#btn-delete-kategori', function() {

        let id = $(this).data('id');
        let token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {
                //console.log('test');
                //fetch to delete data
                $.ajax({
                    url: `/kategori/destroy/${id}`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success: function(response) {

                        //show success message
                        Swal.fire({
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        location.reload();
                        //remove post on table
                        $(`#index_${id}`).remove();
                    }
                });
            }
        })

    });

    // category edit
    $('body').on('click', '#btn-edit-kategori',
        function() {
            let id = $(this).data('id');

            //fetch detail post with ajax
            $.ajax({
                url: '/kategori/edit/' + id,
                type: "GET",
                success: function(response) {
                    // fill data to form
                    $('#id').val(response.data.id);
                    $('#kategori_nama-edit').val(response.data.kategori_nama);
                    //open modal
                    $('#modal-edit').modal('show');
                }
            });
        });

    $('#update_category').click(function(e) {
        e.preventDefault();
        //define variable
        let id = $('#id').val();
        let kategori_nama = $('#kategori_nama-edit').val();
        let token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: `kategori/update/${id}`,
            type: "PUT",
            cache: false,
            data: {
                "kategori_nama": kategori_nama,
                "_token": token
            },

            success: function(response) {
                //show success message
                Swal.fire({
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                location.reload();

                //data post
                let category = `
                <tr id="index_${response.data.id}">

                    <td>${response.data.kategori_nama} </td>
                    <td>${response.data.kategori_slug} </td>

                    <td class="text-center">
                        <a href="javascript:void(0)" id="btn-edit-kategori" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                        <a href="javascript:void(0)" id="btn-delete-kategori" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                    </td>
                </tr>
            `;

                $(`#index_${response.data.id}`).replaceWith(category);

                //close modal
                $('#modal-edit').modal('hide');

            },

            error: function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status === 422) {
                    let errors = jqXHR.responseJSON.errors;
                    if (errors.kategori_nama) {
                        // show alert
                        $('#alert-kategori_nama').removeClass('d-none');
                        $('#alert-kategori_nama').addClass('d-block');

                        //add message to alert
                        $('#alert-kategori_nama').html(errors.kategori_nama[0]);
                    }
                }
            }

        });
    });

    $('body').on('click', '#btn-create-article', function() {

        //open modal
        $('#modal-create').modal('show');
    });

    // When the #store-artikel element is clicked
    $('#store-artikel').click(function(e) {
        // Prevent the default action of the event
        e.preventDefault();

        // Define variables for the article title, content, and CSRF token
        let articleCategory = $('#category_id').val();
        let articleTitle = $('#artikel_judul').val();
        let articleContent = CKEDITOR.instances[editorId].getData();
        let articleSampul = $('#artikel_sampul')[0].files[0];
        let articleStatus = $('#artikel_status').val();
        let csrfToken = $("meta[name='csrf-token']").attr("content");

        let formData = new FormData();
        formData.append('artikel_kategori', articleCategory);
        formData.append('artikel_judul', articleTitle);
        formData.append('artikel_konten', articleContent);
        formData.append('artikel_sampul', articleSampul);
        formData.append('artikel_status', articleStatus);
        formData.append('_token', csrfToken);

        $.ajax({
                url: `/article/store`,
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: formData
            })
            .done(function(response) {
                // If the request is successful, show a success message
                Swal.fire({
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                setTimeout(function() {
                    location.reload();
                }, 1000);
                // Create a table row with the article data
                let articleRow = `
            <tr id="index_${response.data.id}">
                <td>${response.data.artikel_kategori} </td>
                <td>${response.data.artikel_tanggal} </td>
                <td>${response.data.artikel_judul} </td>
                <td>${response.data.artikel_konten} </td>
                <td>${response.data.artikel_sampul} </td>
                <td>${response.data.artikel_status} </td>
                <td class="text-center">
                    <a href="javascript:void(0)" id="btn-lihat-artikel" data-id="${response.data.id}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="javascript:void(0)" id="btn-edit-artikel" data-id="${response.data.id}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="javascript:void(0)" id="btn-delete-artikel" data-id="${response.data.id}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        `;
                // Add the table row to the table
                $('#table-artikel').prepend(articleRow);

                // Clear the form

                $('#artikel_kategori').val('');
                $('#artikel_judul').val('');
                $('#artikel_konten').val('');
                $('#artikel_sampul').val('');
                $('#artikel_status').val('');

                // Close the modal
                $('#modal-create').modal('hide');
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                // If there are errors, show them to the user
                if (jqXHR.status === 422) {
                    let errors = jqXHR.responseJSON.errors;

                    if (errors.artikel_kategori) {
                        // Show an alert with the error message for the article title field
                        $('#alert-artikel_kategori').removeClass('d-none');
                        $('#alert-artikel_kategori').addClass('d-block');
                        $('#alert-artikel_kategori').html(errors.artikel_kategori[0]);
                    }

                    if (errors.artikel_judul) {
                        // Show an alert with the error message for the article title field
                        $('#alert-artikel_judul').removeClass('d-none');
                        $('#alert-artikel_judul').addClass('d-block');
                        $('#alert-artikel_judul').html(errors.artikel_judul[0]);
                    }

                    if (errors.artikel_konten) {
                        // Show an alert with the error message for the article content field
                        $('#alert-artikel_konten').removeClass('d-none');
                        $('#alert-artikel_konten').addClass('d-block');
                        $('#alert-artikel_konten').html(errors.artikel_konten[0]);
                    }

                    if (errors.artikel_sampul) {
                        // Show an alert with the error message for the article content field
                        $('#alert-artikel_sampul').removeClass('d-none');
                        $('#alert-artikel_sampul').addClass('d-block');
                        $('#alert-artikel_sampul').html(errors.artikel_sampul[0]);
                    }

                    if (errors.artikel_status) {
                        // Show an alert with the error message for the article content field
                        $('#alert-artikel_status').removeClass('d-none');
                        $('#alert-artikel_status').addClass('d-block');
                        $('#alert-artikel_status').html(errors.artikel_status[0]);
                    }
                }
            });
    });

    $('body').on('click', '#btn-delete-article', function() {

        let id = $(this).data('id');
        let token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {
                //console.log('test');
                //fetch to delete data
                $.ajax({
                    url: `/article/destroy/${id}`,
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success: function(response) {

                        //show success message
                        Swal.fire({
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        location.reload();
                        //remove post on table
                        $(`#index_${id}`).remove();
                    }
                });
            }
        })

    });
</script>
