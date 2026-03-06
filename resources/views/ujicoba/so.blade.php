<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function ambilIDPO(id_po) {
        var ada = sessionStorage.getItem('ID_PO');
        if (ada == !null) {
            sessionStorage.removeItem('ID_PO');
        }
        sessionStorage.setItem('ID_PO', id_po);
        document.getElementById('ID_PO').value = id_po;
        $('#poModal').modal('hide');
    }
    document.addEventListener("DOMContentLoaded", function() {

        const modalTableBody = document.getElementById('modalTableBody');
        const submitModalBtn = document.getElementById('submitModal');
        const id_po = sessionStorage.getItem('ID_PO');

        function setSessionData(data) {
            sessionStorage.setItem('selectedItems', JSON.stringify(data));
        }
        $(document).on('click', '#submitModal', function(event) {
            event.preventDefault();
            // console.log("Button Clicked");

            const id_po = sessionStorage.getItem('ID_PO');
            setTimeout(function() {
                $('#updateQuantity' + id_po).modal('hide');
            }, 300);

            plisberhasil();
        });

        function plisberhasil() {
            const selectedItems = [];
            const rows = modalTableBody.querySelectorAll('tr');

            rows.forEach(row => {
                const id = row.querySelector('.id-input');
                const quantityInput = row.querySelector('.quantity-input');
                const hargaInput = row.querySelector('.harga-input');
                const diskonInput = row.querySelector('.diskon-input');

                // console.log("ID:", id ? id.value : "N/A");
                // console.log("Quantity:", quantityInput ? quantityInput.value : "N/A");
                // console.log("Harga:", hargaInput ? hargaInput.value : "N/A");
                // console.log("Diskon:", diskonInput ? diskonInput.value : "N/A");

                const quantity = quantityInput ? quantityInput.value : 0;
                const harga = hargaInput ? hargaInput.value : 0;
                const diskon = diskonInput ? diskonInput.value : 0;

                if (id !== null) {
                    selectedItems.push({
                        id: id ? id.value : null,
                        quantity,
                        harga,
                        diskon,
                    });
                }
            });

            const existingData = JSON.parse(sessionStorage.getItem('selectedItems')) || [];
            const existingDataMap = new Map(existingData.map(item => [item.id, item]));

            selectedItems.forEach(newItem => {
                const existingItem = existingDataMap.get(newItem.id);
                if (existingItem) {
                    existingItem.quantity = newItem.quantity;
                } else {
                    existingDataMap.set(newItem.id, newItem);
                }
            });

            const updatedData = Array.from(existingDataMap.values());
            sessionStorage.setItem('selectedItems', JSON.stringify(updatedData));

            if (selectedItems.length > 0) {
                const resultInput = document.getElementById('result');
                resultInput.value = JSON.stringify(selectedItems);
            }
        }



    });
    $(document).ready(function() {
        function updateTotalPrice(index) {
            var quantity = parseInt($(`input[name="stok[]"]`).eq(index).val()) || 0;
            var harga = parseInt($(`input[name="harga[]"]`).eq(index).val()) || 0;
            var diskon = parseInt($(`input[name="diskon[]"]`).eq(index).val()) || 0;
            // Update the total price input field
            $(`input[name="total_harga[]"]`).eq(index).val(total);
        }
        // Attach event listeners to input fields
        $(document).on('input', 'input[name^="stok[]"], input[name^="harga[]"], input[name^="diskon[]"]',
            function() {
                var index = $(this).closest('tr').index();
                updateTotalPrice(index);
            });
        // Trigger initial calculation for existing rows
        $('input[name^="stok[]"]').each(function(index) {
            updateTotalPrice(index);
        });
    });




    function tampilModal() {
        var id_po = sessionStorage.getItem('ID_PO');
        $('#updateQuantity' + id_po).modal('show');
    }

    function closeModalUpdate(id_po) {
        $('#updateQuantity' + id_po).modal('hide');
    }

    function closeModal(id_po) {
        $('#detailpb' + id_po).modal('hide');
    }

    function closeModalPO(id_po) {
        $('#dataPO' + id_po).modal('hide');
    }

    function submitcuy() {
        sessionStorage.removeItem('ID_PO');
    }
</script>
