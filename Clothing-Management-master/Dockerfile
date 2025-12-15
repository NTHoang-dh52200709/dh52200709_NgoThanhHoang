FROM node:alpine
WORKDIR /app
COPY . .
# Nếu có file package.json thì bỏ comment dòng dưới, không thì thôi
# RUN npm install
EXPOSE 3000
CMD ["npm", "start"]
# Lưu ý: Sửa 'server.js' thành tên file chạy chính của bạn (ví dụ index.js, app.js...)