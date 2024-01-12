// ================= FETCH TAGS FROM DATABASE ==================
const tagsContainer = document.getElementById('tags-container');
function fetchTagsFromDatabase (data) {
    tagsContainer.innerHTML = '';
    data.forEach(tag => {
        tagsContainer.innerHTML += `
        <div class="card p-5 bg-slate-50 shadow-sm rounded-lg">
            <div>
                <span class="bg-blue-200 text-sm block w-[fit-content] py-1.5 px-2 rounded-md mb-6">.${tag.Tag_name}</span>
                <div class="text-right text-gray-800 text-sm">
                Created <span class="">${tag.Created_at}</span>
                </div>
            </div>
        </div>
        `
    });

}


// =============== SEARCH TAGS ==================
const searchTags = document.getElementById('search_tags');
console.log(searchTags);
searchTags.addEventListener('keyup' , () => {
    const searchVal = searchTags.value.trim();
    var encodedString = encodeURIComponent(searchVal);

    fetch('http://localhost/wikis/visitor/findTags?search='  + encodedString , {
         method : "GET",
         headers : {
             'Content-Type': 'application/json',
         },
         
    }).then(response => {
         if (!response.ok) {
             throw new Error('Network not OK');
         }
         return response.json();
    }).then(data => {
        console.log(data);
         fetchTagsFromDatabase(data.tags)
    }).catch(error => {
         console.error('Error Fetch Data ' + error);
    })



})