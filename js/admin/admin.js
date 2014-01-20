/**
 * Created by user on 20.01.14.
 */
(function($) {
    $(document).ready(function(e) {
        $("#tab_strip").kendoTabStrip({
            animation:  {
                open: {
                    effects: "fadeIn"
                }
            }
        });

        var subdivision = $("#subdivision").kendoGrid({
            dataSource: {
                type: "json",
                transport: {
                    read: {
                        url: BASE_URL+"api/subdivision.php",
                        dataType: "json",
                        type: "POST",
                        data: {
                                id: 0
                        }
                    }
                },
                pageSize: 5
            },
            height: 430,
            sortable: true,
            pageable: true,
//            detailTemplate: kendo.template($("#template").html()),
//            detailInit: detailInit,
//            dataBound: function() {
//                this.expandRow(this.tbody.find("tr.k-master-row").first());
//            },
            columns: [
                {
                    field: "name",
                    title: "Название"
                },
                {
                    field: "tel",
                    title: "Телефон",
                    width: "300px"
                }
            ]
        });
    });
})(jQuery);

function detailInit(e) {
//    var detailRow = e.detailRow;
//
//    detailRow.find(".tabstrip").kendoTabStrip({
//        animation: {
//            open: { effects: "fadeIn" }
//        }
//    });
//
//    detailRow.find(".orders").kendoGrid({
//        dataSource: {
//            type: "odata",
//            transport: {
//                read: "http://demos.kendoui.com/service/Northwind.svc/Orders"
//            },
//            serverPaging: true,
//            serverSorting: true,
//            serverFiltering: true,
//            pageSize: 5,
//            filter: { field: "EmployeeID", operator: "eq", value: e.data.EmployeeID }
//        },
//        scrollable: false,
//        sortable: true,
//        pageable: true,
//        columns: [
//            { field: "OrderID", title:"ID", width: "56px" },
//            { field: "ShipCountry", title:"Ship Country", width: "110px" },
//            { field: "ShipAddress", title:"Ship Address" },
//            { field: "ShipName", title: "Ship Name", width: "190px" }
//        ]
//    });
};
