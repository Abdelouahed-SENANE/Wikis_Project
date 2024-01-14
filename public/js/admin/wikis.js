const wikiContainer = document.getElementById('wikis-container');

function getAllWikis(data) {
    wikiContainer.innerHTML = '';
    data.wikis.forEach(wiki => {
        wikiContainer.innerHTML += `
            <tr>
                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap ID_wiki">
                    ${wiki.ID_wiki}
                </td>
                <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                    <div>
                        <img src="http://localhost/wikis/assets/upload/${wiki.Wiki_img}" alt="" class="w-12 h-12">
                    </div>
                </td>
                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                    ${wiki.Wiki_title}
                </td>
                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap text-ellipsis overflow-hidden text-nowrap max-w-[200px]">
                    ${wiki.Wiki_content}
                </td>
                
                <td class="px-4 py-4 text-sm whitespace-nowrap">
                    ${wiki.Created_at}
                </td>
                
                <td class="px-4 py-4 text-sm whitespace-nowrap text-center">
                    <!-- delete button -->
                    <button class="px-1 py-1  bg-rose-600 transition-colors duration-200 rounded-lg block   cursor-pointer hover:bg-red-500 delete">
                        <svg class="w-6 h-6 text-white pointer-events-none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                        </svg>
                    </button>
                </td>
            </tr>
        `
    });

}
    
    
    
    fetch('http://localhost/wikis/admin/getAllWikis' , {

    method : 'GET',
    }).then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
    }).then(data => {
        
        getAllWikis(data)

    }).catch(error => {
        console.error('Fetch error:', error);
    });
    
    // Delete Wiki From Database 

    wikiContainer.addEventListener('click' , (e) => {
        if (e.target.classList.contains('delete')) {

            var url = 'http://localhost/wikis/admin/deleteWiki';

            const isConfirmed = window.confirm("Are you sure to Delete article");
            if (isConfirmed) {
                var id_wiki = e.target.closest('tr').querySelector('.ID_wiki').textContent.trim();

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        id: id_wiki,
                    }),
                }).then(response => {
                    if (response.ok) {
                        return response.json();
                    }
                    throw new Error('Network Failed')
                }).then(data => {
                    getAllWikis(data)(data);

                }).catch(error => {
                    console.error('ERROR FETCH DATA ' + error);
                })

            }

        }
    })