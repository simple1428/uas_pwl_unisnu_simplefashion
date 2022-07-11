const flasdata = $(".flash-data").data("flashdata");
const name = $(".flash-data").data("name");
if (flasdata) {
    Swal.fire({
        position: "center",
        icon: "success",
        title: name + " has been " + flasdata,
        showConfirmButton: false,
        timer: 1500,
    });
}

$(".tombol-hapus").on("click", function(e) {
    e.preventDefault();
});