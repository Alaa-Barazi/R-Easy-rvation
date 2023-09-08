
var w, h;

const tableWidth = 30;//Table width
const tableHeight = 30;//Table heigth
const chairBreath = 3;//chair breath
var width =0;//Rest Width take from db
var height = 0;//Rest Height
var rows = 0;
var cols = 0;
const MAX = 255;
const SQ_DIM = 10;
const SQ_DIM_W = 30;
const SQ_DIM_H = 30;
var xmlhttp = new XMLHttpRequest();
var url = "../Owner/Rest/RestProp.php";
xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);
        var value = data;
        let x = value[0];
        let y = value[1];
        w = parseInt(x);
        h = parseInt(y);
        console.log(w+" "+h)
        init();

    }
};
xmlhttp.open("GET", url, true);
xmlhttp.send();

let grid = [];
let ctx;
const params = new URLSearchParams(window.location.search);
const urlParams = new URLSearchParams(window.location.search);

function init() {
    width = w * 100;//Rest Width take from db
    height = h * 100;//Rest Height
    rows = Math.floor(height / (tableHeight + chairBreath));
    cols = Math.floor(width / (tableWidth + chairBreath));
   
    // Get the HTML canvas and context
    let boardCanvas = document.getElementById("canvas");
    ctx = boardCanvas.getContext("2d");
    // Setup an initial grid of white
    for (let x = 0; x < rows; x++) {
        grid[x] = [];
        for (let y = 0; y < cols; y++) {
            grid[x][y] = MAX;
        }
    }
    // Draw the board
    drawBoard();
}
globalData = [];
// Draw the entire board (the View)
function drawBoard() {
    for (let y = 0; y < rows; y++) {
        for (let x = 0; x < cols; x++) {
            drawSquare(x, y);
        }
    }
    //AJAX
    var xmlhttp = new XMLHttpRequest();
    var url = "availableTables.php";
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            var data = JSON.parse(this.responseText);
            globalData.push(data);
            //Draw the exisiting tables from database
            for (i = 0; i < data.length; i++) {
                var value = data[i];
                let dimH = value[1][1];
                let dimW = value[1][0];
                let x = value[1][2];
                let y = value[1][3];
                if(y < rows && x < cols){
                drawSquare2(x, y);
                ctx.lineWidth = chairBreath;
                ctx.strokeStyle = "whitesmoke";
                ctx.fillRect(x * SQ_DIM_W, y * SQ_DIM_H, SQ_DIM_W, SQ_DIM_H);
                ctx.strokeRect(x * SQ_DIM_W, y * SQ_DIM_H, SQ_DIM_W, SQ_DIM_H);
                }
            }
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}
function drawSquare2(x, y) {
    //if (y < rows && x < cols) {
    //let c = grid[0][0];
    if(y < rows && x < cols){
    ctx.lineWidth = chairBreath;
    ctx.strokeStyle = "whitesmoke";
    ctx.fillStyle = "green";
    ctx.fillRect(x * 30, y * 30, 30, 30);
    //ctx.fillRect(x * SQ_DIM, y * SQ_DIM, SQ_DIM, SQ_DIM);
    ctx.strokeRect(x * 30, y * 30, 30, 30);
    }
    // }
}
// Draws a single square on the board (the View)
function drawSquare(x, y) {
    if (y < rows && x < cols) {
        ctx.lineWidth = chairBreath;
        ctx.strokeStyle = "whitesmoke";
        ctx.fillRect(x * SQ_DIM_W, y * SQ_DIM_H, SQ_DIM_W, SQ_DIM_H);
        //ctx.fillRect(x * SQ_DIM, y * SQ_DIM, SQ_DIM, SQ_DIM);
        ctx.strokeRect(x * SQ_DIM_W, y * SQ_DIM_H, SQ_DIM_W, SQ_DIM_H);
    }
}
// Here's the Controller!
// Controlling the colour of the grid

function foundInDB(xClick, yClick) {
    /*function that checks if the clicked square is available */
    //Draw the existing  tables from database
    for (i = 0; i < globalData[0].length; i++) {
        let value = globalData[0][i];
        let x = value[1][2];
        let y = value[1][3];
        if (xClick == x && yClick == y) {
            return value[0];
        }
    }
    alert('not okay choose a marked square');
    return -1;
}


function boardClicked(event) {
    let x = Math.floor(event.offsetX / SQ_DIM_W);
    let y = Math.floor(event.offsetY / SQ_DIM_H);
    let found = foundInDB(x, y);
    if (found != -1) {
        /*ctx.fillStyle = "#966F33";
        ctx.stroke();
        grid[0][0] = "#966F33";
        drawSquare(x, y);*/
        const hour = urlParams.get('hour');
        const date = urlParams.get('date');
        const PartySize = urlParams.get('PartySize');
        const id = urlParams.get('id');
        let url = `bookTable.php?id=${id}&hour=${hour}&date=${date}&table=${found}&PartySize=${PartySize}`;
        window.location.href = url;
    }
}