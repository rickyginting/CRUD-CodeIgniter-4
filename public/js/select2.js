$('.namaDosen').select2({
    ajax: {
        url: 'http://localhost:8080/api/namaDosen',
        dataType: 'json',
        delay: 250,

        processResults: function(data) {
            var results = [];

            $.each(data, function(index, item) {
                results.push({
                    id: item.nip,
                    text: item.nama_dosen
                });
                //Menyimpan Nip Ke Textbox
                $("#hasil").val(item.nip);
            });

            return {
                results: results
            };

        }
    }
});