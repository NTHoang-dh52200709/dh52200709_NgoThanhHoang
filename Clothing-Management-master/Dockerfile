# BẮT BUỘC dùng Node 14 vì dự án này dùng node-sass cũ
FROM node:14

WORKDIR /app

# Copy file định nghĩa thư viện vào trước
COPY package*.json ./

# Cài đặt thư viện
RUN npm install

# Copy toàn bộ code vào
COPY . .

# Mở cổng 3000
EXPOSE 3000

# Chạy lệnh start như trong package.json
CMD ["npm", "start"]