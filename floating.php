    <style>
        
        /* 浮动窗口样式 */
        .float-window {
            position: fixed;
            width: 250px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border: 1px solid #e0e0e0;
            overflow: hidden;
            z-index: 9999;
            transition: all 0.3s ease;
        }
        
        /* 窗口头部 */
        .float-header {
            background-color: #ff8383ff;
            color: white;
            padding: 8px 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: default;
        }
        
        .float-header .title {
            font-weight: bold;
            font-size: 14px;
        }
        
        /* 关闭按钮 */
        .float-close-button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background-color 0.2s;
        }
        
        .close-button:hover {
            background-color: rgba(255,255,255,0.2);
        }
        
        /* 窗口内容 */
        .float-content {
            padding: 12px;
        }
        
        .float-content p {
            margin-bottom: 8px;
            font-size: 13px;
            color: #333;
        }
        
        .float-content .small-text {
            font-size: 11px;
            color: #666;
        }
        
        .float-content img {
            width: 100%;
            border-radius: 4px;
            margin-top: 8px;
        }
    </style>

    <!-- 浮动窗口 -->
    <div id="floatingWindow" class="float-window">
        <div class="float-header">
            <span class="title">小广告（狗头）</span>
            <button id="floatCloseBtn" class="float-close-button">×</button>
        </div>
        <div class="float-content">
            <p>神秘地带动感 MilthmCalc 崭新出锅</p>
            <p class="small-text">访问即可使用超动感查分图生成！注册即享999历史查询保存！</p>
            <img src="/wtf/T.webp" alt="逆天小图片">
        </div>
    </div>

    <script>
        // 获取元素
        const floatingWindow = document.getElementById('floatingWindow');
        const floatCloseBtn = document.getElementById('floatCloseBtn');

        // 初始位置和速度
        let x = 100;
        let y = 100;
        let dx = 1.2;  // X方向速度
        let dy = 1.2; // Y方向速度
        
        // 设置随机初始位置
        function setRandomStartPosition() {
            const maxX = window.innerWidth - floatingWindow.offsetWidth;
            const maxY = window.innerHeight - floatingWindow.offsetHeight;
            x = Math.floor(Math.random() * maxX);
            y = Math.floor(Math.random() * maxY);
            
            // 随机初始方向
            if (Math.random() > 0.5) dx = -dx;
            if (Math.random() > 0.5) dy = -dy;
        }
        
        // 窗口移动函数
        function moveWindow() {
            // 如果窗口已关闭则停止移动
            if (floatingWindow.style.display === 'none') return;
            
            // 获取窗口尺寸和屏幕尺寸
            const windowWidth = floatingWindow.offsetWidth;
            const windowHeight = floatingWindow.offsetHeight;
            const screenWidth = window.innerWidth;
            const screenHeight = window.innerHeight;
            
            // 更新位置
            x += dx;
            y += dy;
            
            // 碰到左右边界反弹
            if (x <= 0 || x >= screenWidth - windowWidth) {
                dx = -dx;
                // 增加一点随机性，避免固定路径
                dx *= (0.9 + Math.random() * 0.2);
            }
            
            // 碰到上下边界反弹
            if (y <= 0 || y >= screenHeight - windowHeight) {
                dy = -dy;
                // 增加一点随机性
                dy *= (0.9 + Math.random() * 0.2);
            }
            
            // 应用新位置
            floatingWindow.style.left = `${x}px`;
            floatingWindow.style.top = `${y}px`;
            
            // 继续下一帧动画
            requestAnimationFrame(moveWindow);
        }
        
        // 关闭按钮功能
        floatCloseBtn.addEventListener('click', () => {
            floatingWindow.style.opacity = '0';
            floatingWindow.style.transform = 'scale(0.8)';
            setTimeout(() => {
                floatingWindow.style.display = 'none';
            }, 300);
        });
        
        // 窗口大小改变时重新计算边界
        window.addEventListener('resize', () => {
            const windowWidth = floatingWindow.offsetWidth;
            const windowHeight = floatingWindow.offsetHeight;
            const screenWidth = window.innerWidth;
            const screenHeight = window.innerHeight;
            
            // 确保窗口在边界内
            x = Math.max(0, Math.min(x, screenWidth - windowWidth));
            y = Math.max(0, Math.min(y, screenHeight - windowHeight));
        });
        
        // 初始化
        setRandomStartPosition();
        // 开始移动动画
        requestAnimationFrame(moveWindow);
    </script>