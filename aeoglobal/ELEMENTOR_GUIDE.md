# 🎨 엘레멘토 HTML 위젯 사용 가이드

Abel GEO 랜딩 페이지를 엘레멘토 HTML 위젯으로 사용하는 방법을 안내합니다.

## 📋 준비 단계

### 1단계: 이미지 파일 WordPress 미디어 라이브러리에 업로드

1. WordPress 관리자 → **미디어** → **새로 추가**
2. 다음 이미지 파일들을 업로드:
   ```
   ✅ hero-iphone-mockup.png
   ✅ comparison-visual.png
   ✅ icon-geo.png
   ✅ icon-gmb.png
   ✅ icon-multilang.png
   ✅ icon-aibot.png
   ```

3. 각 이미지 업로드 후 **파일 URL 복사** (나중에 사용)

### 2단계: 이미지 URL 메모

업로드한 각 이미지의 URL을 메모장에 정리하세요:

```
Hero 이미지: https://yourdomain.com/wp-content/uploads/2026/01/hero-iphone-mockup.png
비교 이미지: https://yourdomain.com/wp-content/uploads/2026/01/comparison-visual.png
GEO 아이콘: https://yourdomain.com/wp-content/uploads/2026/01/icon-geo.png
GMB 아이콘: https://yourdomain.com/wp-content/uploads/2026/01/icon-gmb.png
다국어 아이콘: https://yourdomain.com/wp-content/uploads/2026/01/icon-multilang.png
AI Bot 아이콘: https://yourdomain.com/wp-content/uploads/2026/01/icon-aibot.png
```

## 🚀 엘레멘토 설정

### 1단계: 새 페이지 생성

1. WordPress 관리자 → **페이지** → **새로 추가**
2. 페이지 제목: `글로벌 GEO` (또는 원하는 이름)
3. **Elementor로 편집** 클릭

### 2단계: HTML 위젯 추가

1. 왼쪽 패널에서 **HTML** 위젯 검색
2. 페이지에 드래그 앤 드롭
3. HTML 위젯 설정 열기

### 3단계: HTML 코드 삽입

1. `index.html` 파일 열기
2. **전체 내용 복사** (Ctrl + A → Ctrl + C)
3. Elementor HTML 위젯의 **HTML 코드** 필드에 붙여넣기

### 4단계: 이미지 경로 수정

HTML 코드에서 다음 부분을 찾아 수정:

#### Hero 이미지 (1개)
```html
<!-- 찾기 -->
<img src="./assets/hero-iphone-mockup.png"

<!-- 바꾸기 -->
<img src="https://yourdomain.com/wp-content/uploads/2026/01/hero-iphone-mockup.png"
```

#### 비교 이미지 (1개)
```html
<!-- 찾기 -->
<img src="./assets/comparison-visual.png"

<!-- 바꾸기 -->
<img src="https://yourdomain.com/wp-content/uploads/2026/01/comparison-visual.png"
```

#### 솔루션 아이콘 (4개)
```html
<!-- 찾기 -->
<img src="./assets/solution-icons/icon-geo.png"
<img src="./assets/solution-icons/icon-gmb.png"
<img src="./assets/solution-icons/icon-multilang.png"
<img src="./assets/solution-icons/icon-aibot.png"

<!-- 바꾸기 -->
<img src="https://yourdomain.com/wp-content/uploads/2026/01/icon-geo.png"
<img src="https://yourdomain.com/wp-content/uploads/2026/01/icon-gmb.png"
<img src="https://yourdomain.com/wp-content/uploads/2026/01/icon-multilang.png"
<img src="https://yourdomain.com/wp-content/uploads/2026/01/icon-aibot.png"
```

### 5단계: CSS 인라인 삽입

1. `styles.css` 파일 열기
2. 전체 내용 복사
3. HTML 코드 `<head>` 섹션 안에 다음과 같이 추가:

```html
<style>
/* 여기에 styles.css 내용 전체 붙여넣기 */
</style>
```

### 6단계: JavaScript 인라인 삽입

1. `script.js` 파일 열기
2. 전체 내용 복사
3. HTML 코드 `</body>` 태그 바로 앞에 다음과 같이 추가:

```html
<script>
// 여기에 script.js 내용 전체 붙여넣기
</script>
```

## ⚙️ 엘레멘토 위젯 설정

### HTML 위젯 설정
- **너비**: 전체 너비 (100%)
- **여백**: 0
- **패딩**: 0

### 섹션 설정
1. HTML 위젯이 들어있는 섹션 선택
2. **레이아웃** 탭:
   - 컨텐츠 너비: **전체 너비**
   - 열 간격: **간격 없음**
3. **고급** 탭:
   - 여백: **0**
   - 패딩: **0**

## ✅ 최종 확인

- [ ] 모든 이미지가 표시되는지 확인
- [ ] 스크롤 애니메이션 작동 확인
- [ ] CTA 버튼 클릭 시 카카오톡 링크 작동 확인
- [ ] 모바일 반응형 확인
- [ ] 페이지 게시

## 🎯 간단 요약

1. **이미지 업로드** → WordPress 미디어 라이브러리
2. **URL 복사** → 각 이미지 URL 메모
3. **페이지 생성** → Elementor로 편집
4. **HTML 위젯** → index.html 전체 복사 붙여넣기
5. **이미지 경로 수정** → 상대 경로를 절대 URL로 변경
6. **CSS/JS 추가** → `<style>`과 `<script>` 태그로 인라인 삽입
7. **게시** → 완료!

## 💡 팁

- **Ctrl + F** (찾기)를 사용하면 이미지 경로를 빠르게 찾을 수 있습니다
- 이미지 URL은 반드시 **https://**로 시작해야 합니다
- 엘레멘토 미리보기에서 먼저 확인 후 게시하세요

## 🆘 문제 해결

### 이미지가 안 보여요
→ 이미지 URL이 정확한지 확인 (브라우저에서 URL 직접 접속 테스트)

### 스타일이 안 먹혀요
→ `<style>` 태그가 `<head>` 안에 있는지 확인

### 애니메이션이 안 돼요
→ `<script>` 태그가 `</body>` 바로 앞에 있는지 확인

---

**더 자세한 내용은 아래 파일을 참고하세요:**
- `elementor-complete-code.txt` - 완성된 HTML 코드 (이미지 경로만 수정하면 됨)
