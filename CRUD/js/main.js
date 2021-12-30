jQuery(document).ready(function($){

    let printTable = (dataTable) => {
        if(dataTable.length > 0) {
            let row = '';
            dataTable.forEach((item, index) => {
                row += `
                    <tr>
                        <td>${ index + 1 }</td>
                        <td class="user-name" contenteditable>${ item.name }</td>
                        <td>
                            <button data-id="${item.id}" class="btn edit-row btn-success">Edit</button>
                            <button data-id="${item.id}" class="btn delete-row btn-danger">Remove</button>
                        </td>
                    </tr>
                `;
            });
            $("#result").html(row);
        }

        $('.delete-row').on("click", function() {
            let row_id = $(this).attr("data-id");
            $.ajax({
                url:'./../server/app/routes/web.php',
                method:'get',
                data:{ row_id, action:'delete'},
                dataType:'json',
                success:function(data) {
                    location.reload();
                }
            });
        });

        $('.edit-row').on("click", function() {
            let row_id = $(this).attr("data-id");
            let name = $(this).parents("tr").find(".user-name").text();
            $.ajax({
                url:'./../server/app/routes/web.php',
                method:'get',
                data:{ row_id, name, action:'update'},
                dataType:'json',
                success:function(data) {
                    location.reload();
                }
            });
        })
    }

    $.ajax({
        url:'./../server/app/routes/web.php',
        method:'get',
        data:{ action:'all-users'},
        dataType:'json',
        success:function(data) {
            console.log(data)
            printTable(data.data)
        }
    });

    $("#create-user").on("click", function() {
        let name = $("#name").val();
        $.ajax({
            url:'./../server/app/routes/web.php',
            method:'post',
            data:{ name, action:'create' },
            dataType:'json',
            success:function(data) {
                location.reload();
            }
        });
    })
})