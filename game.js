
// constant values 
const size = 75;
let currBoard = [size], nextBoard = [size];
let gameStarted = false;
let timer, generationSpeed = 400, generation = 0;

// function that sets up the board
function setupGame(){
    createBoard();
    createBoardArrays();
    changeGeneration(generation++);
}


// we need to create the table onload
function createBoard(){

    // declare the board and grid, add id so we can style it
    var board = document.getElementById('gameBoard');
    var table = document.createElement('table');

    table.setAttribute('id', 'gameGrid');

    // now make each row and column based on the variable size
    for( let i = 0; i < size; i++ ){

        var row = document.createElement('tr');
        for( let j = 0; j < size; j++ ){
        
            var cell = document.createElement('td');

            // add identifier so we can come back later and change its color
            cell.setAttribute('id', 'cell_' + i + '_' + j );
            cell.setAttribute('class', 'inactive');

            // add function to be called if you click on a cell
            cell.addEventListener('mouseover', clickedCell );
            cell.addEventListener('click', clickedCell );

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
    var i = splitCell[1];
    var j = splitCell[2];

    // toggle it on or off depending on previous state
    if( this.className == 'inactive' ){
        this.setAttribute('class', 'active');
        currBoard[i][j] = 1;
    }
    else{
        this.setAttribute('class', 'inactive');
        currBoard[i][j] = 0;
    }


}


// function to create the arrays to store the values of the cells
function createBoardArrays(){

    // need to make everything a 2d array first
    for( var i = 0; i < size; i++ ){
        currBoard[i] = new Array(size);
        nextBoard[i] = new Array(size);
    }

    // then fill everything with 0's to show there are no filled arrays
    resetArray();
}


// sets all the values in the board to zero
function resetArray(){
    
    for( var i = 0; i < size; i++ ){
        for( var j = 0; j < size; j++ ){
            currBoard[i][j] = 0;
            nextBoard[i][j] = 0;
        }
    }
}


// resets all the values
function reset(){

    // end the timer
    endLoop();
    
    // make all the squares inactive
    for( var i = 0; i < size; i++ ){
        for( var j = 0; j < size; j++ ){
            var cell = document.getElementById('cell_'+i+'_'+j);
            cell.setAttribute('class', 'inactive');
        }
    }

    generation = 0;
    changeGeneration(generation);

    // reset all the values in the arrays
    resetArray();
}


// this will incrememnt by one generation
function increment(){

    // check the neighbors of each piece on the board
    for( var i = 0; i < size; i++ ){
        for( var j = 0; j < size; j++ ){
            
            var n_count = getNeighbors(i, j);
            
            if( currBoard[i][j] == 1 ){
                // if active
                
                if( n_count < 2 || n_count > 3 ){
                    nextBoard[i][j] = 0;
                }
                else if( n_count == 3 || n_count == 2 ){
                    nextBoard[i][j] = 1;
                }

            }
            else if( currBoard[i][j] == 0 ){
                // if inactive 

                if( n_count == 3 )
                    nextBoard[i][j] = 1;
            }
        }
    }

    // update the generation
    for( var i = 0; i < size; i++ ){
        for( var j = 0; j < size; j++ ){
            currBoard[i][j] = nextBoard[i][j];
            nextBoard[i][j] = 0;
        }
    }

    // update the cells to show the new generation
    changeGeneration(generation++);
    updateBoard();
    
}


// this function returns how many neighbors a cell has
function getNeighbors( i, j ){
    var count = 0;

    // check top neighbor
    if( i - 1 >= 0 && currBoard[i-1][j] == 1 ){
        count++;
    }

    // check top right neighbor
    if( (i - 1 >= 0 && j + 1 < size) && currBoard[i-1][j+1] == 1 ){
        count++;
    }

    // check top left neighbor
    if( (i - 1 >= 0 && j - 1 >= 0) && currBoard[i-1][j-1] == 1 ){
        count++;
    }

    // check right neighbor
    if( j + 1 < size && currBoard[i][j+1] == 1 ){
        count++;
    }

    // check left neighbor
    if( j - 1 >= 0 && currBoard[i][j-1] == 1 ){
        count++;
    }

    // check bottom neighbor
    if( i + 1 < size && currBoard[i+1][j] == 1 ){
        count++;
    }

    // check bottom right neighbor
    if( (i + 1 < size && j + 1 < size) && currBoard[i+1][j+1] == 1 ){
        count++;
    }
    
    // check bottom left neighbor
    if( (i + 1 < size && j - 1 >= 0) && currBoard[i+1][j-1] == 1 ){
        count++;
    }

    return count;
}


// updates the board according to current board.
function updateBoard(){

    for( var i = 0; i < size; i++ ){
        for( var j = 0; j < size; j++ ){

            var cell = document.getElementById('cell_'+i+'_'+j);
            
            if( currBoard[i][j] == 1 ){
                cell.setAttribute('class', 'active');
            }
            else{ 
                cell.setAttribute('class', 'inactive');
            }
        }
    }
}


// function that increments 23 times
function twenty_three_increments( p ){

    started = true;
    setTimeout( function(){
        p++;
        increment();
        if( p < 23 )
            twenty_three_increments(p)
    }, generationSpeed);

}


// function that loops every 1 sec to update to new generation
function loop(){

    increment();
    if( gameStarted ){
        timer = setTimeout( loop, generationSpeed );
    }

}


// function to start gerneration loop
function startLoop(){

    gameStarted = true;
    loop();
}


// function to end gerneration loop
function endLoop(){

    if( gameStarted ){
        gameStarted = false;
        clearTimeout(timer);
    }
}


// change the generation text
function changeGeneration( current ){
    var text = document.getElementById('generation');
    text.innerHTML = 'Generation ' + current;
}