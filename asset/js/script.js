var keyword = document.getElementById('keyword-resep');
var tombolcari = document.getElementById('tombol-cookbook');
var container = document.getElementById('hasil-resep');

keyword.addEventListener('keyup', function(){
    
    var xhr =  new XMLHttpRequest();

    xhr.onreadystatechange = function (){
        if (xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText
        }
    }

    xhr.open('GET', 'asset/ajax/resep.php?keyword=' + keyword.value, true);
    xhr.send();

});