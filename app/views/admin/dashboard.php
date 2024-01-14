<?php include APPROOT . '/views/Includes/Admin/header.php' ?>

<?php include APPROOT . '/views/Includes/Admin/sidebar.php' ?>

<main class="flex-1 bg-slate-100 w-full">
    <?php include APPROOT . '/views/Includes/Admin/navbar.php' ?>

    <div class="container my-10  mx-auto    w-[90%] ">
        <div class="bg-orange-100 py-8 rounded-lg shadow-sm px-5">
            <h1 class="text-[35px] font-semibold">Good Afternoun </h1>
            <p class="text-gray-600"> Here is What's happening with your projects today</p>
        </div>

        <div class="grid grid-cols-4 my-10 gap-2">
            <div class=" relative w-[360px] p-5 bg-blue-500 text-blue-500 rounded">
                <div class="flex justify-between items-center">
                    <span class="text-2xl text-white text-semibold ">Users</span>

                    <span class="h-16 w-16 rounded-full flex items-center justify-center bg-white ">
                        <svg class="w-8 h-8 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                    </span>
                </div>
                <span class="text-white text-[35px]"><?= $data['statistics'][0]->number_records ?></span>
            </div>

            <div class=" relative w-[360px] p-5 bg-orange-500 text-orange-500 rounded">
                <div class="flex justify-between items-center">
                    <span class="text-2xl text-white text-semibold ">Tags</span>

                    <span class="h-16 w-16 rounded-full flex items-center justify-center bg-white ">
                        <svg class="w-8 h-8 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M15.045.007 9.31 0a1.965 1.965 0 0 0-1.4.585L.58 7.979a2 2 0 0 0 0 2.805l6.573 6.631a1.956 1.956 0 0 0 1.4.585 1.965 1.965 0 0 0 1.4-.585l7.409-7.477A2 2 0 0 0 18 8.479v-5.5A2.972 2.972 0 0 0 15.045.007Zm-2.452 6.438a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                        </svg>
                    </span>
                </div>
                <span class="text-white text-[35px]"><?= $data['statistics'][3]->number_records ?></span>
            </div>

            <div class=" relative w-[360px] p-5 bg-rose-500 text-rose-500 rounded">
                <div class="flex justify-between items-center">
                    <span class="text-2xl text-white text-semibold ">Categories</span>

                    <span class="h-16 w-16 rounded-full flex items-center justify-center bg-white ">
                        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 19">
                            <path d="M1 19h13a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H0v10a1 1 0 0 0 1 1ZM0 6h7.443l-1.2-1.6a1 1 0 0 0-.8-.4H1a1 1 0 0 0-1 1v1Z" />
                            <path d="M17 4h-4.557l-2.4-3.2a2.009 2.009 0 0 0-1.6-.8H4a2 2 0 0 0-2 2h3.443a3.014 3.014 0 0 1 2.4 1.2l2.1 2.8H14a3 3 0 0 1 3 3v8a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Z" />
                        </svg>
                    </span>
                </div>
                <span class="text-white text-[35px]"><?= $data['statistics'][1]->number_records ?></span>
            </div>
            <div class=" relative w-[360px] p-5 bg-slate-500 text-slate-500 rounded">
                <div class="flex justify-between items-center">
                    <span class="text-2xl text-white text-semibold ">Wikis</span>

                    <span class="h-16 w-16 rounded-full flex items-center justify-center bg-white ">
                        <svg class=" w-8 h-8 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                            <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                            <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                        </svg>
                    </span>
                </div>
                <span class="text-white text-[35px]"><?= $data['statistics'][2]->number_records ?></span>
            </div>
        </div>
    </div>

    <div class="container my-10  mx-auto w-[90%]">
        <div class="flex items-center gap-5 ">
            <div class="bg-white shadow-md rounded-lg p-5 w-full" id="charts_1">
                <canvas id="myChart1" width="400" height="200"></canvas>

            </div>
            <div class="bg-white shadow-md rounded-lg p-5  w-full" id="charts_2">
            <canvas id="myChart2" width="100" height="100" class="max-h-[400px]" style="width : 300px; height : 200px;"></canvas>

            </div>
        </div>
    </div>




















</main>
<!-- Script JS ============== -->
<script>

    fetch('http://localhost/wikis/admin/statistics' , {

        method : 'GET',
        }).then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
        }).then(data => {
            const ctx_1 = document.getElementById('myChart1');
            const ctx_2 = document.getElementById('myChart2');
            var statis = data.wikiByCategory;
            const labelsCategory = statis.map(category => category.Category_Name);
            const valuesWiki = statis.map(wiki => wiki.wiki_count);

            new Chart(ctx_1, {
                type: 'line',
                data: {
                labels: labelsCategory,
                datasets: [{
                    label: 'Wiki',
                    data: valuesWiki,
                }]
                },
                options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'CREATE WIKI BY CATEGORY',
                    }
                }
            }
            });
            console.log(data);
            var total_rows_db = data.rows_database.total_rows;
            var average_table_in_database = data.rows_tables.map(table=> {
                return Math.floor((table.total_rows / total_rows_db) * 100);
            })
            var name_table = data.rows_tables.map(name_table => name_table.table_name)

            new Chart(ctx_2, {
                type: 'doughnut',
                data: {
                labels: name_table,
                datasets: [{
                    label: 'Wiki',
                    data: average_table_in_database,
                }]
                },
                options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'CREATE WIKI BY CATEGORY',
                    }
                
                }
                
            }
            });

        }).catch(error => {
            console.error('Fetch error:', error);
    });
</script>





<?php include APPROOT . '/views/Includes/Admin/footer.php' ?>