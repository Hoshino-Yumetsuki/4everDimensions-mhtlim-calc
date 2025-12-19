<div class="sb-robot">
    <style>
        html{
            background-color: #000;
        }
        .sb-container{
            padding: 12px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .sb-robot{
            display: flex;
            flex-direction: column;
            width: 30vw;
            min-width: 256px;
            max-width: 450px;
            min-height: 60vh;
            max-height: 80vh;
            color: white;
            /* background: linear-gradient(to bottom, #583d6ecc, #595799cc); */
            border: #ffffff77 2px solid;
            border-radius: 24px;
            overflow: hidden;
        }
        .sb-cap{
            font-size: large;
            padding: 16px;
            background: linear-gradient(to bottom, #899dff6a, rgba(255, 255, 255, 0));
        }
        #sb-msgs{
            max-height: 64vh;
            flex: 1;
            overflow: scroll;
        }
        #sb-btm{
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0), #899dff6a);
            padding: 12px;
            display: flex;
            flex-direction: row;
        }
        #sb-btm input{
            background: #ffffff00;
            outline: none;
            color: #ffffff;
            border: #ffffff33 2px solid;
            border-radius: 24px;
            flex:1;
            height: 32px;
            padding: 8px;
            transition: all 0.2s ease;
        }
        #sb-btm input:focus{
            background: #ffffff18;
            border: #ffffff77 2px solid;
        }
        #sb-btm input:active{
            transform: translateY(3.0px) rotate3d(1, 0, 0, -15deg);
        }
        #sb-btm button{
            transition: all 0.2s ease;
            margin-left: 8px;
            background: #e19dff99;
            color: #ffffff;
            border: #ffffff33 2px solid;
            border-radius: 24px;
            height: 32px;
            padding: 6px;
        }
        #sb-btm button:hover{
            transition: all 0.2s ease;
            background: #e19dff99;
            border: #ffffff77 2px solid;
        }
        #sb-btm button:active{
            transition: all 0.2s ease;
            background: #9656b299;
            border: #ffffff33 2px solid;
            transform: translateY(3.0px) rotate3d(1, 0, 0, -15deg);
        }
        .sb-msg{
            background: #ffffff11;
            border-radius: 24px;
            border: #ffffff33 2px solid;
            padding: 4px;
            margin-bottom: 3px;
            white-space: normal;
        }
    </style>
    <div class="sb-cap">
        智障机器人问答
    </div>
    <div class="sb-container">
        <div id="sb-msgs">
        </div>
        
    </div>
    <div id="sb-btm">
        <input id="sb-input"/>
        <button id="sb-send">发送</button>
    </div>

    <script>
        var sb_get_msg_list=(()=>{
            var sb_msgs = [];
            var giao = (e)=>{return document.getElementById(e)};
            var mgs = giao("sb-msgs");
            var inp = giao("sb-input");
            var cao = ()=>{
                mgs.innerHTML='';
                sb_msgs.forEach((ciao)=>{
                    var ne = document.createElement("div")
                    ne.classList.add("sb-msg")
                    ne.innerHTML = ciao.content;
                    mgs.appendChild(ne)
                })
                mgs.scrollTop=mgs.scrollHeight
            }
            giao("sb-send").onclick = ()=>{
                sb_msgs.push({"role": "user", "content": inp.value})
                inp.value=''
                cao()
            }

            return ()=>{return sb_msgs}
        })()

    </script>
</div>