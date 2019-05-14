Matter.use(
    'matter-collision-events'
);

//
// ──────────────────────────────────────────────────────────────────────────── I ──────────
//   :::::: V A R I A B L E S : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────────
//
//
// ─────────────────────────────────────────────────────── DOCUMENT VARIABLES ─────
//
var gameCanvas = document.getElementById('gameCanvas'),
    gameCanvasData = {
        width: gameCanvas.offsetWidth,
        height: gameCanvas.offsetHeight
    };
// ────────────────────────────────────────────────────────────────────────────────
//
// ───────────────────────────────────────────────────────── MATTER VARIABLES ─────
//
var Engine = Matter.Engine,
    Render = Matter.Render,
    World = Matter.World,
    Bodies = Matter.Bodies,
    Body = Matter.Body,
    MouseConstraint = Matter.MouseConstraint,
    Mouse = Matter.Mouse,
    Composites = Matter.Composites;

var engine = Engine.create(),
    render = Render.create({
        element: gameCanvas,
        engine: engine,
        options: {
            width: gameCanvasData.width,
            height: gameCanvasData.height,
            background: 'transparent',
            wireframes: false
        },
        pixelRatio: 'auto'
    });
// ────────────────────────────────────────────────────────────────────────────────




//
// ──────────────────────────────────────────────── II ──────────
//   :::::: G A M E : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────
//
//
// ─────────────────────────────────────────────────────────────────── GAME BODIES ─────
//
/*  Walls */
var leftWall = Bodies.rectangle(0, 0, gameCanvasData.width / 100, gameCanvasData.height * 2, {
        isStatic: true,
        render: {
            fillStyle: 'transparent',
            strokeStyle: 'transparent'
        }
    }, ),
    rightWall = Bodies.rectangle(gameCanvasData.width, 0, gameCanvasData.width / 100, gameCanvasData.height * 2, {
        isStatic: true,
        render: {
            fillStyle: 'transparent',
            strokeStyle: 'transparent'
        }
    }),
    topWall = Bodies.rectangle(0, 0, gameCanvasData.width * 2, gameCanvasData.width / 100, {
        isStatic: true,
        render: {
            fillStyle: 'transparent',
            strokeStyle: 'transparent'
        }
    }),
    bottomWall = Bodies.rectangle(0, gameCanvasData.height, gameCanvasData.width * 2, gameCanvasData.width / 100, {
        isStatic: true,
        render: {
            fillStyle: 'transparent',
            strokeStyle: 'transparent'
        }
    });
/* Goals */
var goalA = Composites.stack(gameCanvasData.width - (gameCanvasData.width / 100) * 3, (gameCanvasData.height / 100) * 10, 3, 5, 0, 0, function (x, y) {
        return Bodies.rectangle(x, y, gameCanvasData.width / 100, gameCanvasData.height / 25, {
            name: 'A',
            isStatic: false,
            render: {
                fillStyle: 'rgba(0, 0, 0, 0.7)',
            }
        });
    }),
    goalB = Composites.stack(gameCanvasData.width - (gameCanvasData.width / 100) * 3, (gameCanvasData.height / 100) * 40, 3, 5, 0, 0, function (x, y) {
        return Bodies.rectangle(x, y, gameCanvasData.width / 100, gameCanvasData.height / 25, {
            name: 'B',
            isStatic: false,
            render: {
                fillStyle: 'rgba(0, 0, 0, 0.7)',
            }
        });
    }),
    goalC = Composites.stack(gameCanvasData.width - (gameCanvasData.width / 100) * 3, (gameCanvasData.height / 100) * 70, 3, 5, 0, 0, function (x, y) {
        return Bodies.rectangle(x, y, gameCanvasData.width / 100, gameCanvasData.height / 25, {
            name: 'C',
            isStatic: false,
            render: {
                fillStyle: 'rgba(0, 0, 0, 0.7)',
            }
        });
    });

/* Maze */
var maze_1 = Bodies.rectangle(gameCanvasData.width / 2, (gameCanvasData.height / 100) * 5, gameCanvasData.width, gameCanvasData.height / 100, {
        isStatic: true,
        render: {
            fillStyle: 'rgba(0, 0, 0, 0.6)',
        }
    }),
    maze_1_A = Bodies.rectangle(gameCanvasData.width / 3, gameCanvasData.height / 6.5, gameCanvasData.width / 10, gameCanvasData.height / 5, {
        isStatic: true,
        render: {
            fillStyle: 'rgba(0, 0, 0, 0.6)',
        }
    }),
    maze_1_B = Bodies.rectangle(gameCanvasData.width / 1.8, gameCanvasData.height / 4, gameCanvasData.width / 10, gameCanvasData.height / 5, {
        isStatic: true,
        render: {
            fillStyle: 'rgba(0, 0, 0, 0.6)',
        }
    }),
    maze_1_C = Bodies.rectangle(gameCanvasData.width / 1.3, gameCanvasData.height / 6.5, gameCanvasData.width / 10, gameCanvasData.height / 5, {
        isStatic: true,
        render: {
            fillStyle: 'rgba(0, 0, 0, 0.6)',
        }
    }),
    maze_2 = Bodies.rectangle(gameCanvasData.width / 1.7, gameCanvasData.height / 2.9, gameCanvasData.width / 1.2, gameCanvasData.height / 100, {
        isStatic: true,
        render: {
            fillStyle: 'rgba(0, 0, 0, 0.6)',
        }
    }),
    maze_2_A = Bodies.rectangle(gameCanvasData.width / 3, gameCanvasData.height / 1.85, gameCanvasData.width / 10, gameCanvasData.height / 5, {
        isStatic: true,
        render: {
            fillStyle: 'rgba(0, 0, 0, 0.6)',
        }
    }),
    maze_2_B = Bodies.rectangle(gameCanvasData.width / 1.8, gameCanvasData.height / 2.25, gameCanvasData.width / 10, gameCanvasData.height / 5, {
        isStatic: true,
        render: {
            fillStyle: 'rgba(0, 0, 0, 0.6)',
        }
    }),
    maze_2_C = Bodies.rectangle(gameCanvasData.width / 1.3, gameCanvasData.height / 1.85, gameCanvasData.width / 10, gameCanvasData.height / 5, {
        isStatic: true,
        render: {
            fillStyle: 'rgba(0, 0, 0, 0.6)',
        }
    }),
    maze_3 = Bodies.rectangle(gameCanvasData.width / 1.7, gameCanvasData.height / 1.55, gameCanvasData.width / 1.2, gameCanvasData.height / 100, {
        isStatic: true,
        render: {
            fillStyle: 'rgba(0, 0, 0, 0.6)',
        }
    }),
    maze_3_A = Bodies.rectangle(gameCanvasData.width / 3, gameCanvasData.height / 1.18, gameCanvasData.width / 10, gameCanvasData.height / 5, {
        isStatic: true,
        render: {
            fillStyle: 'rgba(0, 0, 0, 0.6)',
        }
    }),
    maze_3_B = Bodies.rectangle(gameCanvasData.width / 1.5, gameCanvasData.height / 1.335, gameCanvasData.width / 3, gameCanvasData.height / 5, {
        isStatic: true,
        render: {
            fillStyle: 'rgba(0, 0, 0, 0.6)',
        }
    }),
    maze_4 = Bodies.rectangle(gameCanvasData.width / 2, gameCanvasData.height - ((gameCanvasData.height / 100) * 5), gameCanvasData.width, gameCanvasData.height / 100, {
        isStatic: true,
        render: {
            fillStyle: 'rgba(0, 0, 0, 0.6)',
        }
    });

/* Balls */
var proyectileA = Matter.Bodies.circle(gameCanvasData.width / 100, gameCanvasData.height / 6, gameCanvasData.height / 25, {
        name: 'purple',
        render: {
            fillStyle: 'rgba(214,93,177, 0.7)'
        }
    }),
    proyectileB = Matter.Bodies.circle(gameCanvasData.width / 100, gameCanvasData.height / 3, gameCanvasData.height / 25, {
        name: 'pink',
        render: {
            fillStyle: 'rgba(255,111,145, 0.7)'
        }
    }),
    proyectileC = Matter.Bodies.circle(gameCanvasData.width / 100, gameCanvasData.height / 2, gameCanvasData.height / 25, {
        name: 'red',
        render: {
            fillStyle: 'rgba(255,150,113,0.7)'
        }
    }),
    proyectileD = Matter.Bodies.circle(gameCanvasData.width / 100, gameCanvasData.height / 1.5, gameCanvasData.height / 25, {
        name: 'orange',
        render: {
            fillStyle: 'rgba(255,199,95,0.7)'
        }
    }),
    proyectileE = Matter.Bodies.circle(gameCanvasData.width / 100, gameCanvasData.height / 1.2, gameCanvasData.height / 25, {
        name: 'yellow',
        render: {
            fillStyle: 'rgba(249,248,113, 0.7)'
        }
    });

/**/
proyectileA.onCollide(
    function (pair) {
        colliding(pair);
    }
);

proyectileB.onCollide(
    function (pair) {
        colliding(pair);
    }
);

proyectileC.onCollide(
    function (pair) {
        colliding(pair);
    }
);

proyectileD.onCollide(
    function (pair) {
        colliding(pair);
    }
);

proyectileE.onCollide(
    function (pair) {
        colliding(pair);
    }
);
// ────────────────────────────────────────────────────────────────────────────────
//
// ─────────────────────────────────────────────────────────────── GAME MOUSE ─────
//
var mouse = Mouse.create(render.canvas),
    mouseConstraint = MouseConstraint.create(engine, {
        mouse: mouse,
        constraint: {
            stiffness: 0.001,
            render: {
                visible: false
            }
        }
    });
//
// ────────────────────────────────────────────────────────────── GAME CONFIG ─────
//
World.add(engine.world, mouseConstraint);
render.mouse = mouse;
World.add(engine.world, [leftWall, rightWall, topWall, bottomWall, goalA, goalB, goalC, proyectileA, proyectileB, proyectileC, proyectileD, proyectileE, maze_1, maze_1_A, maze_1_B, maze_1_C, maze_2, maze_2_A, maze_2_B, maze_2_C, maze_3, maze_3_A, maze_3_B, maze_4]);
engine.world.gravity.y = 0;
engine.world.gravity.x = 0;
Engine.run(engine);
Render.run(render);
Render.lookAt(render, {
    min: {
        x: 0,
        y: 0
    },
    max: {
        x: gameCanvasData.width,
        y: gameCanvasData.height
    }
});
// ────────────────────────────────────────────────────────────────────────────────


//
// ────────────────────────────────────────────────────────────────────────── III ──────────
//   :::::: R E S P O N S I V E   C O N F I G : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────────────────────
//
// add a function to adjust the canvas size if the screen is resized
window.onresize = function (event) {
    gameCanvas.width = window.innerWidth;
    gameCanvas.height = window.innerHeight;
    Render.run(render);
};


//
// ──────────────────────────────────────────────────────────────────────── IV ──────────
//   :::::: R E S T A R T   F U N C T I O N : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────
//

function restart() {
    location.reload(true);

}