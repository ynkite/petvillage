<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $message = $request->input('message', '');
        
        // 간단한 키워드 기반 응답 (실제로는 AI API를 사용할 수 있습니다)
        $response = $this->getResponse($message);
        
        return response()->json([
            'response' => $response
        ]);
    }

    private function getResponse($message)
    {
        $message = mb_strtolower($message);
        
        // 입양 관련
        if (strpos($message, '입양') !== false || strpos($message, '분양') !== false) {
            return "입양을 원하시는군요! 🐾\n\n입양 가능한 동물들을 보시려면 '동물 목록' 메뉴를 확인해주세요. 입양 절차나 자세한 정보가 필요하시면 '입양 안내' 페이지를 참고해주세요.";
        }
        
        
        // 위치/센터 관련
        if (strpos($message, '위치') !== false || strpos($message, '센터') !== false || strpos($message, '주소') !== false) {
            return "센터 위치를 찾고 계시는군요! 📍\n\n전국에 여러 센터가 있습니다. '센터 안내' 메뉴에서 가까운 센터를 찾아보세요. 각 센터의 주소, 전화번호, 운영 시간을 확인할 수 있습니다.";
        }
        
        // 전화번호 관련
        if (strpos($message, '전화') !== false || strpos($message, '연락') !== false || strpos($message, '번호') !== false) {
            return "연락처를 찾고 계시는군요! 📞\n\n각 센터별로 입소 전화와 입양 전화가 따로 있습니다. '센터 안내' 메뉴에서 원하시는 센터의 연락처를 확인하실 수 있습니다.";
        }
        
        // 인사
        if (strpos($message, '안녕') !== false || strpos($message, 'hello') !== false || strpos($message, 'hi') !== false) {
            return "안녕하세요! 👋\n\n유기동물 입양 사이트 챗봇입니다. 입양, 센터 정보 등 무엇이든 물어보세요!";
        }
        
        // 도움말
        if (strpos($message, '도움') !== false || strpos($message, 'help') !== false || strpos($message, '도와') !== false) {
            return "도움을 드리겠습니다! 💬\n\n다음과 같은 질문을 하실 수 있습니다:\n• 입양 절차\n• 센터 위치\n• 전화번호\n• 입양 후기\n\n원하시는 내용을 말씀해주세요!";
        }
        
        // 기본 응답
        return "죄송합니다. 더 정확한 답변을 위해 다음 키워드를 사용해주세요:\n\n• 입양 / 분양\n• 센터 / 위치\n• 전화 / 연락처\n• 도움말\n\n또는 메뉴를 통해 원하시는 정보를 찾아보세요!";
    }
}

