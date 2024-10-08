<head>
    <style>
        body {
            padding: 10px 20px;
        }

        #tag_table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #tag_table td,
        #tag_table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #tag_table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #tag_table tr:hover {
            background-color: #ddd;
            cursor: pointer;
        }

        #tag_table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #AAA;
            color: white;
        }
    </style>
</head>

<body>

    <?php
    echo '<div>';
    echo '<p id="instructions"></p>';
    echo '<div id="template_tags"></div>';
    echo '</div>';
    ?>

    <script type="text/javascript">
        (function() {

            // Get main editor to assign lang vars
            var ed_langs = top.tinymce.activeEditor;

            // Get passed js vars from main.php
            var editor_params = top.tinymce.activeEditor.windowManager.getParams();
            var get_template_tags = editor_params.wpas_editor_js_vars.template_tags;

            // Insert localized instructions
            document.getElementById("instructions").innerHTML = ed_langs.getLang('wpas_editor_langs.instructions');

            // Define template tags wrapper
            var wrapper = document.getElementById("template_tags");

            // Setup table for tags and descriptions
            var table = '';
            table += '<table id="tag_table">';

            table += '<thead><tr><th>' + ed_langs.getLang('wpas_editor_langs.table_header_tag') + '</th><th>' + ed_langs.getLang('wpas_editor_langs.table_header_desc') + '</th></tr></thead>';
            table += '<tbody>';

            // Loop each tag and add to table
            for (i = 0; i < get_template_tags.length; i++) {

                table += '<tr onclick="insertIntoMCE(\'' + get_template_tags[i].tag + '\')"><td>' + get_template_tags[i].tag + '</td><td>' + get_template_tags[i].desc + '</td></tr>';
            }

            table += '</tbody>';
            table += '</table>';

            // Insert table into wrapper
            wrapper.innerHTML = table;
        })();

        // Insert content into editor and close window
        function insertIntoMCE(tag) {

            top.tinymce.activeEditor.execCommand('mceInsertContent', false, tag);
            top.tinymce.activeEditor.windowManager.close();
        }
    </script>
</body>