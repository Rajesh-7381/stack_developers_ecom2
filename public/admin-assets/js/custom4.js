
// $(document).ready(function () {
//   $(document).on("click", ".updateCategorystatus", function () {
//       var status = $(this).attr("status");
//       var category_id = $(this).attr("category_id");
//       $.ajax({
//           headers: {
//               "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//           },
//           type: "post",
//           url: "/admin/update-category-status",
//           data: { status: status, category_id: category_id },
//           success: function (response) {
//               // Handle the response from the server after the status update
//               if (response["status"] == 0) {
//                   // If the status is 0, update the icon and status to 'Inactive'
//                   $("#category-" + category_id + " i")
//                       .removeClass("fa-toggle-on")
//                       .addClass("fa-toggle-off")
//                       .css("color", "gray");
//                   $("#category-" + category_id).attr("status", "Inactive");
//               } else if (response["status"] == 1) {
//                   // If the status is 1, update the icon and status to 'Active'
//                   $("#category-" + category_id + " i")
//                       .removeClass("fa-toggle-off")
//                       .addClass("fa-toggle-on")
//                       .css("color", "");
//                   $("#category-" + category_id).attr("status", "Active");
//               } else {
//                   // Handle other cases if needed
//               }
//           },
//           error: function () {
//               // If there's an error with the AJAX request, show an alert
//               alert("Error");
//           }
//       });
//   });
 
//   $(document).on('click','.confirmdelete',function(){
//     var record=$(this).attr('record');
//     alert(record)
//     var record_id=$(this).attr('record_id');
//     // alert(record_id)
//     const swalWithBootstrapButtons = Swal.mixin({
//         customClass: {
//           confirmButton: 'btn btn-success',
//           cancelButton: 'btn btn-danger'
//         },
//         buttonsStyling: false
//       })
      
//       swalWithBootstrapButtons.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Yes, delete it!',
//         cancelButtonText: 'No, cancel!',
//         reverseButtons: true
//       }).then((result) => {
//         if (result.isConfirmed) {
//           swalWithBootstrapButtons.fire(
//             'Deleted!',
//             'Your file has been deleted.',
//             'success'
//           )
//           window.location.href="/admin/delete-"+record+"/"+record_id;
//         } else if (
//           /* Read more about handling dismissals below */
//           result.dismiss === Swal.DismissReason.cancel
//         ) {
//           swalWithBootstrapButtons.fire(
//             'Cancelled',
//             'Your imaginary file is safe :)',
//             'error'
//           )
          
//         }
//       })
// })

// });




