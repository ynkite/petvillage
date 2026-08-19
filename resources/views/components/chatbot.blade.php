<!-- 챗봇 컨테이너 -->
<div id="chatbot-container" style="position: fixed; bottom: 24px; right: 24px; z-index: 99999; width: 70px; height: 70px;">
    <!-- 챗봇 버튼 -->
    <button 
        id="chatbot-toggle" 
        onclick="toggleChatbot()"
        style="width: 70px; height: 70px; background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #00f2fe 100%); border: 4px solid white; border-radius: 50%; cursor: pointer; box-shadow: 0 10px 40px rgba(102, 126, 234, 0.6); display: flex; align-items: center; justify-content: center; color: white; transition: all 0.3s; pointer-events: auto; z-index: 100000; animation: pulse 2s infinite;"
        aria-label="챗봇 열기"
        onmouseover="this.style.transform='scale(1.15)'; this.style.boxShadow='0 15px 50px rgba(102, 126, 234, 0.8)'"
        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 10px 40px rgba(102, 126, 234, 0.6)'"
    >
        <svg style="width: 32px; height: 32px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
        </svg>
    </button>

    <!-- 챗봇 창 -->
    <div 
        id="chatbot-window" 
        style="position: absolute; bottom: 90px; right: 0; width: 450px; height: 650px; background: rgba(255, 255, 255, 0.98); backdrop-filter: blur(30px); -webkit-backdrop-filter: blur(30px); border-radius: 30px; box-shadow: 0 25px 80px rgba(0,0,0,0.3); display: none; flex-direction: column; border: 3px solid rgba(255,255,255,0.5); overflow: hidden;"
    >
        <!-- 헤더 -->
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #00f2fe 100%); color: white; padding: 25px; display: flex; align-items: center; justify-content: space-between; border-radius: 30px 30px 0 0;">
            <div style="display: flex; align-items: center; gap: 15px;">
                <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.25); backdrop-filter: blur(10px); border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 2px solid rgba(255,255,255,0.3);">
                    <svg style="width: 26px; height: 26px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <div>
                    <span style="font-weight: 900; font-size: 18px; display: block; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">AI 상담 챗봇</span>
                    <span style="font-size: 12px; opacity: 0.95; font-weight: 600;">실시간 상담 가능 ✨</span>
                </div>
            </div>
            <div style="display: flex; gap: 10px; align-items: center;">
                <button id="chatbot-fullscreen" onclick="toggleFullscreen()" style="background: rgba(255,255,255,0.25); backdrop-filter: blur(10px); border: 2px solid rgba(255,255,255,0.3); color: white; cursor: pointer; padding: 10px; border-radius: 50%; width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; transition: all 0.2s; font-weight: 900;" onmouseover="this.style.background='rgba(255,255,255,0.4)'" onmouseout="this.style.background='rgba(255,255,255,0.25)'" title="전체화면">
                    <svg id="fullscreen-icon" style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                    </svg>
                </button>
                <button id="chatbot-close" onclick="closeChatbot()" style="background: rgba(255,255,255,0.25); backdrop-filter: blur(10px); border: 2px solid rgba(255,255,255,0.3); color: white; cursor: pointer; padding: 10px; border-radius: 50%; width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; transition: all 0.2s; font-weight: 900;" onmouseover="this.style.background='rgba(255,255,255,0.4)'" onmouseout="this.style.background='rgba(255,255,255,0.25)'">
                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- 메시지 영역 -->
        <div id="chatbot-messages" style="flex: 1; overflow-y: auto; padding: 25px; display: flex; flex-direction: column; gap: 20px; background: linear-gradient(to bottom, #f8f9ff, #ffffff);">
            <div style="display: flex; align-items: flex-start; gap: 15px;">
                <div style="width: 45px; height: 45px; background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #00f2fe 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4); border: 3px solid white;">
                    <span style="color: white; font-size: 22px;">🤖</span>
                </div>
                <div style="background: white; border-radius: 20px; padding: 18px 22px; max-width: 80%; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border: 2px solid rgba(102, 126, 234, 0.1);">
                    <p style="font-size: 15px; color: #1a1a1a; margin: 0; line-height: 1.7; font-weight: 600;">
                        안녕하세요! 유기동물 입양 상담 챗봇입니다. 🐾<br>
                        입양, 센터 정보 등 무엇이든 물어보세요!
                    </p>
                </div>
            </div>
        </div>

        <!-- 입력 영역 -->
        <div style="padding: 25px; border-top: 3px solid rgba(102, 126, 234, 0.1); background: white;">
            <form id="chatbot-form" style="display: flex; gap: 12px;">
                <input 
                    type="text" 
                    id="chatbot-input" 
                    placeholder="메시지를 입력하세요..."
                    style="flex: 1; padding: 16px 22px; border: 3px solid #e0e7ff; border-radius: 18px; background: linear-gradient(to bottom, #f8f9ff, #ffffff); font-size: 16px; outline: none; color: #1a1a1a; font-weight: 600; transition: all 0.3s;"
                    onfocus="this.style.borderColor='#667eea'; this.style.background='white'; this.style.boxShadow='0 0 0 4px rgba(102, 126, 234, 0.15)'"
                    onblur="this.style.borderColor='#e0e7ff'; this.style.background='linear-gradient(to bottom, #f8f9ff, #ffffff)'; this.style.boxShadow='none'"
                >
                <button 
                    type="submit" 
                    style="padding: 16px 28px; background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #00f2fe 100%); color: white; border: none; border-radius: 18px; cursor: pointer; font-size: 16px; font-weight: 900; box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4); transition: all 0.3s; white-space: nowrap; border: 3px solid white;"
                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 30px rgba(102, 126, 234, 0.5)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 20px rgba(102, 126, 234, 0.4)'"
                >
                    전송
                </button>
            </form>
        </div>
    </div>
</div>

<style>
#chatbot-container {
    position: fixed !important;
    bottom: 24px !important;
    right: 24px !important;
    z-index: 99999 !important;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

#chatbot-window {
    animation: slideUp 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px) scale(0.9);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

#chatbot-messages::-webkit-scrollbar {
    width: 8px;
}

#chatbot-messages::-webkit-scrollbar-track {
    background: transparent;
}

#chatbot-messages::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #00f2fe 100%);
    border-radius: 4px;
}

#chatbot-messages::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #764ba2 0%, #f093fb 25%, #4facfe 50%, #00f2fe 75%, #667eea 100%);
}

@media (max-width: 640px) {
    #chatbot-container {
        bottom: 16px !important;
        right: 16px !important;
    }
    
    #chatbot-toggle {
        width: 60px !important;
        height: 60px !important;
    }
    
    #chatbot-window {
        width: calc(100vw - 32px) !important;
        height: calc(100vh - 120px) !important;
        right: 0 !important;
        bottom: 90px !important;
    }
}
</style>

<script>
var isFullscreen = false;
var originalStyle = {
    position: 'absolute',
    bottom: '90px',
    right: '0',
    width: '450px',
    height: '650px',
    borderRadius: '30px'
};

function toggleChatbot() {
    var chatbotWindow = document.getElementById('chatbot-window');
    var chatbotInput = document.getElementById('chatbot-input');
    
    if (!chatbotWindow) {
        console.error('챗봇 창을 찾을 수 없습니다.');
        return;
    }
    
    // 챗봇 창이 닫혀있으면 열기
    if (chatbotWindow.style.display === 'none' || chatbotWindow.style.display === '') {
        chatbotWindow.style.display = 'flex';
        // 원래 스타일로 복원
        chatbotWindow.style.position = originalStyle.position;
        chatbotWindow.style.bottom = originalStyle.bottom;
        chatbotWindow.style.right = originalStyle.right;
        chatbotWindow.style.width = originalStyle.width;
        chatbotWindow.style.height = originalStyle.height;
        chatbotWindow.style.borderRadius = originalStyle.borderRadius;
        chatbotWindow.style.top = '';
        chatbotWindow.style.left = '';
        chatbotWindow.style.zIndex = '';
        isFullscreen = false;
        
        if (chatbotInput) {
            setTimeout(function() {
                chatbotInput.focus();
            }, 100);
        }
    } 
    // 챗봇 창이 열려있고 전체화면이 아니면 → 전체화면으로
    else if (!isFullscreen) {
        chatbotWindow.style.position = 'fixed';
        chatbotWindow.style.top = '0';
        chatbotWindow.style.left = '0';
        chatbotWindow.style.right = '0';
        chatbotWindow.style.bottom = '0';
        chatbotWindow.style.width = '100vw';
        chatbotWindow.style.height = '100vh';
        chatbotWindow.style.borderRadius = '0';
        chatbotWindow.style.zIndex = '999999';
        isFullscreen = true;
    }
    // 전체화면이면 → 일반 크기로
    else {
        chatbotWindow.style.position = originalStyle.position;
        chatbotWindow.style.bottom = originalStyle.bottom;
        chatbotWindow.style.right = originalStyle.right;
        chatbotWindow.style.width = originalStyle.width;
        chatbotWindow.style.height = originalStyle.height;
        chatbotWindow.style.borderRadius = originalStyle.borderRadius;
        chatbotWindow.style.top = '';
        chatbotWindow.style.left = '';
        chatbotWindow.style.zIndex = '';
        isFullscreen = false;
    }
}

function toggleFullscreen() {
    var chatbotWindow = document.getElementById('chatbot-window');
    var fullscreenIcon = document.getElementById('fullscreen-icon');
    
    if (!chatbotWindow || chatbotWindow.style.display === 'none' || chatbotWindow.style.display === '') {
        return;
    }
    
    if (!isFullscreen) {
        // 전체화면으로
        chatbotWindow.style.position = 'fixed';
        chatbotWindow.style.top = '0';
        chatbotWindow.style.left = '0';
        chatbotWindow.style.right = '0';
        chatbotWindow.style.bottom = '0';
        chatbotWindow.style.width = '100vw';
        chatbotWindow.style.height = '100vh';
        chatbotWindow.style.borderRadius = '0';
        chatbotWindow.style.zIndex = '999999';
        isFullscreen = true;
        
        // 아이콘 변경 (축소 아이콘)
        if (fullscreenIcon) {
            fullscreenIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M9 9V4.5M9 9H4.5M9 9L3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5l5.25 5.25"></path>';
        }
    } else {
        // 일반 크기로
        chatbotWindow.style.position = originalStyle.position;
        chatbotWindow.style.bottom = originalStyle.bottom;
        chatbotWindow.style.right = originalStyle.right;
        chatbotWindow.style.width = originalStyle.width;
        chatbotWindow.style.height = originalStyle.height;
        chatbotWindow.style.borderRadius = originalStyle.borderRadius;
        chatbotWindow.style.top = '';
        chatbotWindow.style.left = '';
        chatbotWindow.style.zIndex = '';
        isFullscreen = false;
        
        // 아이콘 변경 (확대 아이콘)
        if (fullscreenIcon) {
            fullscreenIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>';
        }
    }
}

function closeChatbot() {
    var chatbotWindow = document.getElementById('chatbot-window');
    var fullscreenIcon = document.getElementById('fullscreen-icon');
    
    if (chatbotWindow) {
        chatbotWindow.style.display = 'none';
        // 원래 스타일로 복원
        chatbotWindow.style.position = originalStyle.position;
        chatbotWindow.style.bottom = originalStyle.bottom;
        chatbotWindow.style.right = originalStyle.right;
        chatbotWindow.style.width = originalStyle.width;
        chatbotWindow.style.height = originalStyle.height;
        chatbotWindow.style.borderRadius = originalStyle.borderRadius;
        chatbotWindow.style.top = '';
        chatbotWindow.style.left = '';
        chatbotWindow.style.zIndex = '';
        isFullscreen = false;
        
        // 아이콘 복원
        if (fullscreenIcon) {
            fullscreenIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>';
        }
    }
}

(function() {
    'use strict';
    
    function initChatbot() {
        var chatbotContainer = document.getElementById('chatbot-container');
        if (!chatbotContainer) {
            console.error('챗봇 컨테이너를 찾을 수 없습니다.');
            return;
        }
        
        chatbotContainer.style.position = 'fixed';
        chatbotContainer.style.bottom = '24px';
        chatbotContainer.style.right = '24px';
        chatbotContainer.style.zIndex = '99999';
        chatbotContainer.style.display = 'block';
        chatbotContainer.style.visibility = 'visible';
        chatbotContainer.style.pointerEvents = 'auto';
        
        var toggleBtn = document.getElementById('chatbot-toggle');
        var closeBtn = document.getElementById('chatbot-close');
        var chatbotWindow = document.getElementById('chatbot-window');
        var chatbotForm = document.getElementById('chatbot-form');
        var chatbotInput = document.getElementById('chatbot-input');
        var messagesContainer = document.getElementById('chatbot-messages');
        
        if (!chatbotForm || !chatbotInput || !messagesContainer) {
            console.error('챗봇 요소를 찾을 수 없습니다.');
            return;
        }

        if (toggleBtn) {
            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                toggleChatbot();
            });
        }

        var fullscreenBtn = document.getElementById('chatbot-fullscreen');
        if (fullscreenBtn) {
            fullscreenBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                toggleFullscreen();
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                closeChatbot();
            });
        }

        chatbotForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var message = chatbotInput.value.trim();
            if (!message) return;

            addMessage(message, 'user');
            chatbotInput.value = '';

            var loadingId = addMessage('답변을 생성하고 있습니다...', 'bot', true);

            fetch('{{ route("chatbot.chat") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message: message })
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                var loadingEl = document.getElementById(loadingId);
                if (loadingEl) loadingEl.remove();
                addMessage(data.response, 'bot');
            })
            .catch(function(error) {
                var loadingEl = document.getElementById(loadingId);
                if (loadingEl) loadingEl.remove();
                addMessage('죄송합니다. 오류가 발생했습니다. 잠시 후 다시 시도해주세요.', 'bot');
            });
        });

        function addMessage(text, type, isLoading) {
            isLoading = isLoading || false;
            var messageId = 'msg-' + Date.now() + '-' + Math.random();
            var messageDiv = document.createElement('div');
            messageDiv.id = messageId;
            
            if (type === 'user') {
                messageDiv.style.cssText = 'display: flex; align-items: flex-start; gap: 15px; flex-direction: row-reverse;';
                messageDiv.innerHTML = '<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #00f2fe 100%); border-radius: 20px; padding: 18px 22px; max-width: 75%; box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3); border: 3px solid white;"><p style="font-size: 15px; color: white; margin: 0; line-height: 1.7; white-space: pre-line; font-weight: 600;">' + escapeHtml(text) + '</p></div>';
            } else {
                messageDiv.style.cssText = 'display: flex; align-items: flex-start; gap: 15px;';
                messageDiv.innerHTML = '<div style="width: 45px; height: 45px; background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #00f2fe 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4); border: 3px solid white;"><span style="color: white; font-size: 22px;">🤖</span></div><div style="background: white; border-radius: 20px; padding: 18px 22px; max-width: 75%; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border: 2px solid rgba(102, 126, 234, 0.1);"><p style="font-size: 15px; color: #1a1a1a; margin: 0; line-height: 1.7; white-space: pre-line; font-weight: 600;">' + escapeHtml(text) + '</p></div>';
            }

            messagesContainer.appendChild(messageDiv);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

            return messageId;
        }

        function escapeHtml(text) {
            var div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
    }
    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initChatbot);
    } else {
        initChatbot();
    }
    
    window.addEventListener('load', initChatbot);
})();
</script>
