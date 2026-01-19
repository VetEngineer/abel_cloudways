# 🚀 WordPress 배포 빠른 시작 가이드

## 📦 1단계: 파일 준비

현재 작업 폴더에 있는 파일들을 그대로 사용합니다:

```
✅ index.html
✅ styles.css
✅ script.js
✅ assets/ 폴더 전체
```

## 📤 2단계: 서버 업로드

### FTP 사용 (FileZilla 추천)
1. FTP 접속 정보 확인 (호스팅 업체에서 제공)
2. `/public_html/` 디렉토리로 이동
3. 새 폴더 생성: `geo-landing`
4. 모든 파일을 `geo-landing` 폴더에 드래그 앤 드롭

### cPanel 파일 관리자 사용
1. cPanel 로그인
2. 파일 관리자 → `public_html` 이동
3. 폴더 생성: `geo-landing`
4. 파일 업로드 (ZIP으로 압축 후 업로드 → 압축 해제 권장)

## 🔗 3단계: 워드프레스 메뉴 추가

### 외모 > 메뉴에서 추가
1. WordPress 관리자 → **외모** → **메뉴**
2. **사용자 정의 링크** 선택
3. 입력:
   - **URL**: `https://도메인.com/geo-landing/`
   - **링크 텍스트**: `글로벌 GEO`
4. **메뉴에 추가** → **저장**

## ✅ 4단계: 테스트

- [ ] `https://도메인.com/geo-landing/` 접속 확인
- [ ] 모든 이미지가 표시되는지 확인
- [ ] CTA 버튼 클릭 → 카카오톡 링크 작동 확인
- [ ] 모바일에서 반응형 확인
- [ ] 헤더 메뉴에서 클릭 시 이동 확인

## 🎯 완료!

페이지가 정상적으로 작동하면 배포 완료입니다.

---

## 📋 업로드할 파일 목록

```
geo-landing/
├── index.html                          (12.4 KB)
├── styles.css                          (16.6 KB)
├── script.js                           (4.5 KB)
└── assets/
    ├── hero-iphone-mockup.png         (369 KB)
    ├── comparison-visual.png          (662 KB)
    └── solution-icons/
        ├── icon-geo.png
        ├── icon-gmb.png
        ├── icon-multilang.png
        └── icon-aibot.png
```

## 🆘 문제 해결

### 이미지가 안 보여요
→ `assets` 폴더가 제대로 업로드되었는지 확인

### 404 에러가 나요
→ 파일명이 정확히 `index.html`인지 확인

### 스타일이 깨져요
→ 브라우저 캐시 삭제 (Ctrl + Shift + R)

---

**더 자세한 내용은 `implementation_plan.md`를 참고하세요.**
