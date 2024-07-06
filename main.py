import pandas as pd
from sklearn.cluster import KMeans
import matplotlib.pyplot as plt
from sklearn.preprocessing import StandardScaler
import seaborn as sns

# Data preparation with encoded diagnoses
data = pd.DataFrame({
    'Diagnosis': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    'Kelompok Usia 1': [0, 9, 0, 1, 2, 6, 9, 24, 0, 0],
    'Kelompok Usia 2': [0, 8, 0, 0, 4, 4, 2, 5, 0, 1],
    'Kelompok Usia 3': [0, 2, 7, 0, 3, 2, 4, 9, 0, 1],
    'Kelompok Usia 4': [6, 3, 42, 0, 7, 1, 16, 6, 0, 7],
    'Kelompok Usia 5': [2, 0, 12, 0, 2, 1, 3, 0, 0, 7],
    'Jumlah Perempuan': [7, 14, 52, 1, 15, 8, 12, 21, 0, 8],
    'Jumlah Laki-laki': [4, 8, 10, 0, 3, 6, 22, 23, 0, 8]
})

# Standardizing features
scaler = StandardScaler()
data_scaled = scaler.fit_transform(data)

# Elbow method to find the optimal k
inertia = []
K = range(1, 10)
for k in K:
    kmeans = KMeans(n_clusters=k, random_state=42)
    kmeans.fit(data_scaled)
    inertia.append(kmeans.inertia_)

# Plotting the elbow curve
plt.figure(figsize=(8, 4))
plt.plot(K, inertia, 'bo-')
plt.xlabel('Number of clusters')
plt.ylabel('Inertia')
plt.title('Elbow Method For Optimal k')
plt.show()

# Choose optimal k (for example, k=3)
optimal_k = 3

# Apply K-means with optimal k
kmeans = KMeans(n_clusters=optimal_k, random_state=42)
kmeans.fit(data_scaled)
clusters = kmeans.predict(data_scaled)
data['Cluster'] = clusters

# Visualize clustering results
sns.pairplot(data, hue='Cluster', palette='viridis')
plt.show()

# Print the DataFrame with cluster labels
print(data)
