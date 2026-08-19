<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $userMessage = $request->input('message', '');

        // AI 역할 프롬프트
        $systemPrompt = "
        당신은 '유기동물 입양 사이트 AI 상담원'입니다.

아래 조건을 반드시 따릅니다:
1) 사용자의 질문이 특정 카테고리에 해당하면,
   반드시 다음 고정 응답을 사용합니다 (수정 금지).

[고정 응답 규칙]

• '입양', '분양' 포함 → 
  '입양을 원하시는군요! 🐾

   입양 가능한 동물들을 보시려면 '동물 목록' 메뉴를 확인해주세요. 
   입양 절차나 자세한 정보가 필요하시면 '입양 안내' 페이지를 참고해주세요.'

• '위치', '센터', '주소' 포함 →
  '센터 위치를 찾고 계시는군요! 📍

   전국에 여러 센터가 있습니다. '센터 안내' 메뉴에서 가까운 센터를 찾아보세요. 
   각 센터의 주소, 전화번호, 운영 시간을 확인할 수 있습니다.'

• '전화', '연락', '번호' 포함 →
  '연락처를 찾고 계시는군요! 📞

   각 센터별로 입소 전화와 입양 전화가 따로 있습니다. 
   '센터 안내' 메뉴에서 원하시는 센터의 연락처를 확인하실 수 있습니다.'

• '안녕', 'hello', 'hi' 포함 →
  '안녕하세요! 👋

   유기동물 입양 사이트 챗봇입니다. 
   입양, 센터 정보 등 무엇이든 물어보세요!'

• '도움', 'help', '도와' 포함 →
  '도움을 드리겠습니다! 💬

   다음과 같은 질문을 하실 수 있습니다:
   • 입양 절차
   • 센터 위치
   • 전화번호
   • 입양 후기
   원하시는 내용을 말씀해주세요!'

• 위 조건에 해당하지 않을 경우 기본 응답:
  '죄송합니다. 더 정확한 답변을 위해 다음 키워드를 사용해주세요:

   • 입양 / 분양
   • 센터 / 위치
   • 전화 / 연락처
   • 도움말

   또는 메뉴를 통해 원하시는 정보를 찾아보세요!'

2) 고정 응답에 해당하지 않는 일반 질문은 
   LLaMA 3.1 모델을 이용하여 자유롭게 친절하게 답변합니다.

3) 절대로 고정 응답의 문장을 바꾸지 말고 그대로 사용해야 합니다.
        - 질문 의도를 자연스럽게 이해하고 친근하게 답변합니다.
        - 입양 절차, 건강, 성격, 센터 정보 등을 상세히 안내합니다.
        - 모르는 정보는 지어내지 말고 일반적인 가이드만 제공합니다.
        - 지나치게 짧지 않게, 3~6줄 정도로 친절히 답변합니다.
        - 공격적/부적절한 질문에는 거부하고 안전하게 답변합니다.
        - 한국어로만 답변합니다.
        ";

        // Groq API 요청
        $response = Http::withToken(env('GROQ_API_KEY'))->post(
            "https://api.groq.com/openai/v1/chat/completions",
            [
                "model" => "llama-3.1-8b-instant",
                "messages" => [
                    ["role" => "system", "content" => $systemPrompt],
                    ["role" => "user", "content" => $userMessage]
                ],
                "temperature" => 0.7,
                "max_tokens" => 300,
            ]
        );

        $aiMessage = $response->json('choices.0.message.content') ?? 
                     "죄송합니다. 잠시 답변을 생성할 수 없습니다. 다시 시도해주세요.";

        return response()->json([
            'response' => $aiMessage
        ]);
    }
}
