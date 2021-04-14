// we need to create the table onload
function createBoard(){

    // declare the board and grid, add id so we can style it
    var board = document.getElementById('gameBoard');
    var table = document.createElement('table');

    table.setAttribute('id', 'gameGrid');

    // now make each row and column based on a variable
    var size = 50;
    for( let i = 0; i < size; i++ ){

        var row = document.createElement('tr');
        for( let j = 0; j < size; j++ ){
        
            var cell = document.createElement('td');

            // add identifier so we can come back later and change its color
            cell.setAttribute('id', 'cell_' + i + '_' + j );
            cell.setAttribute('class', 'inactive');

            // add function to be called if you click on a cell
            cell.addEventListener('click', clickedCell);

            row.append(cell);
        }
        table.appendChild(row);
    }
    board.appendChild(table);

}

// switch cell from on too off or vice versa, when we click on it
function clickedCell(){

    // first get the coordinate of the cell, so that we can locate it
    var splitCell = this.id.split('_');
    var row = splitCell[1];
    var col = splitCell[2];

    // toggle it on or off depending on previous state
    if( this.className == 'inactive' ){
        this.setAttribute('class', 'active');
    }
    else{
        this.setAttribute('class', 'inactive');
    }

}