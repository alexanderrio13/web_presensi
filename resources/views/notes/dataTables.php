<html>
<head>
<link rel="Stylesheet" src="https://code.jquery.com/jquery-1.12.3.js">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
</head>
<body>
<table id="MyTable" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Postion</th>
                <th>Technologies</th>
                <th>Company Name</th>
                <th>Experience</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>

            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Bikesh</td>
                <td>Srivastava</td>
                <td>Software Engg.</td>
                <td>Asp.net</td>
                <td>Hytech</td>
                <td>4</td>
            </tr>
            <tr>
                <td>Navdeep</td>
                <td>Kumar</td>
                <td>Sr.Software Engg.</td>
                <td>Asp.net</td>
                <td>Hytech</td>
                <td>8</td>
            </tr>
            <tr>
                <td>Sujata</td>
                <td>Sinha</td>
                <td>Software Engg.</td>
                <td>Asp.net</td>
                <td>Hytech</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Panakj</td>
                <td>Bhanadari</td>
                <td>Software Engg.</td>
                <td>Asp.net</td>
                <td>Hytech</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Harikant</td>
                <td>Kumar</td>
                <td>Web Designer</td>
                <td>Asp.net</td>
                <td>Hytech</td>
                <td>4</td>
            </tr>
            <tr>
                <td>Payal</td>
                <td>Agrawal</td>
                <td>Software Engg.</td>
                <td>Salesforce</td>
                <td>Hytech</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Pritam</td>
                <td>Shekhawat</td>
                <td>Manager</td>
                <td>Salesforce</td>
                <td>Hytech</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Saurabh</td>
                <td>Kumar</td>
                <td>Software Engg.</td>
                <td>Asp.net</td>
                <td>HytechPro</td>
                <td>6</td>
            </tr>
            <tr>
                <td>Vinod</td>
                <td>Kumar</td>
                <td>Software Engg.</td>
                <td>Asp.net</td>
                <td>HytechPro</td>
                <td>6</td>
            </tr>
            <tr>
                <td>Manik</td>
                <td>Bansal</td>
                <td>Software Engg.</td>
                <td>SharePoint</td>
                <td>HytechPro</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Brijesh</td>
                <td>Srivastava</td>
                <td>Asst.Manager</td>
                <td>Pharma</td>
                <td>Sun Pharama</td>
                <td>6</td>
            </tr>
            <tr>
                <td>Krishu</td>
                <td>Srivastava</td>
                <td>Software Engg.</td>
                <td>Asp.net</td>
                <td>Hytech</td>
                <td>4</td>
            </tr>
        </tbody>
    </table>
  </body>
  <script>
  $(document).ready(function() {
    $('#MyTable').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                //to select and search from grid
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
  </script>
  </html>
